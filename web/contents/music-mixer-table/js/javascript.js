/** REVERTING EVENT **/
$.ui.draggable.prototype._mouseStop = function(event) {
    //If we are using droppables, inform the manager about the drop
    var dropped = false;
    if ($.ui.ddmanager && !this.options.dropBehaviour)
    	dropped = $.ui.ddmanager.drop(this, event);

    //if a drop comes from outside (a sortable)
    if(this.dropped) {
    	dropped = this.dropped;
    	this.dropped = false;
    }

    if((this.options.revert == "invalid" && !dropped) || (this.options.revert == "valid" && dropped) || this.options.revert === true || ($.isFunction(this.options.revert) && this.options.revert.call(this.element, dropped))) {
    	var self = this;
    	self._trigger("reverting", event);
    	$(this.helper).animate(this.originalPosition, parseInt(this.options.revertDuration, 10), function() {
    		event.reverted = true;
    		self._trigger("stop", event);
    		self._clear();
    	});
    } else {
    	this._trigger("stop", event);
    	this._clear();
    }

    return false;
}

function getSpeedClass(speed){
    switch (true) {
        case (speed < 26):
            return "low_speed";
            break;
        case (speed < 51):
            return "middle_low_speed";
            break;
        case (speed < 76):
            return "middle_high_speed";
            break;
        default:
            return "high_speed";
    }
}

function getVolumeClass(volume){
    
    switch (true) {
        case (volume < 26):
            return "extremely_left";
            break;
        case (volume < 45):
            return "left";
            break;
            
        case (volume < 55):
            return "centre";
            break;
        
        case (volume < 76):
            return "right";
            break;
        default:
            return "extremely_right";
    }
}
/** REVERTING EVENT **/

$(function() {
    /** DRAG **/
    $( ".vynil" ).draggable({
        cursor: "move",
        cursorAt: { top: 120, left: 120 },
        containment: "document",
        revert: "invalid",
        cancel: ".vynil_with_needle",
    	reverting: function(event, ui) {
    		$(this).removeClass("vynil_resting")
                   .addClass("vynil_resting")
                   .removeAttr('style')
    	},
        start: function( event, ui ) {
            $(this).removeClass("vynil_resting")
                   .removeClass("vynil_on_plate")
                   .addClass("moving");
            
            $($(this).parent()).droppable( "option", "disabled", false );            
        },
        stop: function( event, ui ) {
            $(this).removeClass("moving");
        }
    });
    /** DRAG **/
    
    /** DROP **/
    $( "#lmp_maqueta_resting_area" ).droppable({
        accept: "#lmp_maqueta",
        drop: function( event, ui ) {
            $(ui.draggable).appendTo( this )
                           .removeAttr('style')
                           .addClass("vynil_resting");
        }
    });
    
    $( "#lmp_reggae_resting_area" ).droppable({
        accept: "#lmp_reggae",
        drop: function( event, ui ) {
            $(ui.draggable).appendTo( this )
                           .removeAttr('style')
                           .addClass("vynil_resting");
        }
    });
    
    $( "#lmp_instrumentals_resting_area" ).droppable({
        accept: "#lmp_instrumentals",
        drop: function( event, ui ) {
            $(ui.draggable).appendTo( this )
                           .removeAttr('style')
                           .addClass("vynil_resting");
        }
    });
    
    $( ".vynil_area" ).droppable({
        accept: ".vynil",
        greedy: true,
        tolerance: "intersect",
        drop: function( event, ui ) {
            $(ui.draggable).appendTo( this )
                           .removeAttr('style')
                           .addClass("vynil_on_plate");
            
            $(this).droppable( "option", "disabled", true );
        }
    });
    /** DROP **/
    
    /** ON / OFF **/
    $("#turn_on").click(function(){
        if($(this).hasClass("on")){
            //OFF
            $(this).removeClass("on")
                   .addClass("off");
            
            $(".needle").removeClass("needle_on")
                        .removeClass("needle_running");
            
            $(".vynil").removeClass("vynil_with_needle")
                       .removeClass("vynil_rotation_on") 
                       .removeClass("high_speed")
                       .removeClass("middle_high_speed")
                       .removeClass("middle_low_speed")
                       .removeClass("low_speed");
            
            $("#background_sound_left").removeAttr('class');
            $("#background_sound_right").removeAttr('class');
            
            $("#vynil_selector_range").unbind("change");
        }else{
            //ON
            $(this).removeClass("off")
                   .addClass("on");
            
            $(".needle").addClass("needle_on");
                        
            //If the turntable has a vynil... let's go!
            $(".turntable").each(function(index, turntable){
                if( $(turntable).find(".vynil").length > 0 ){
                    setTimeout( function(){
                        if( $(turntable).attr("id") == "turntable_left" ){
                            //LEFT
                            var background = $("#background_sound_left");
                            var control_speed = $("#vynil_speed_left");
                        }else{
                            //RIGHT
                            var background = $("#background_sound_right");
                            var control_speed = $("#vynil_speed_right");
                        }
                        
                        var speed_class = getSpeedClass( parseInt( $(control_speed).val() ) );
                        var volume_class = getVolumeClass( parseInt( $("#vynil_selector_range").val() ) );
                        
                        $(background).addClass( $(turntable).find(".vynil").attr("id") )
                                     .addClass(speed_class+"_background");
                        
                        $(turntable).find(".needle").addClass("needle_running");
                        $(turntable).find(".vynil").addClass("vynil_with_needle")
                                                   .addClass("vynil_rotation_on")
                                                   .addClass(speed_class);
                        
                        $("#background_sound").addClass(volume_class);
                        
                        /** INTERACTIONS **/
                        $("#vynil_speed_left").change(function(){
                            var new_speed_class = getSpeedClass( parseInt( $("#vynil_speed_left").val() ) );
                            if( !$("#background_sound_left").hasClass( new_speed_class ) ){
                                $("#background_sound_left").removeClass("high_speed_background")
                                                           .removeClass("middle_high_speed_background")
                                                           .removeClass("middle_low_speed_background")
                                                           .removeClass("low_speed_background")
                                                           .addClass(new_speed_class+"_background");
                            }
                            
                            var vynil_left = $("#turntable_left").find(".vynil");
                            if( !$(vynil_left).hasClass( new_speed_class ) ){
                                $(vynil_left).removeClass("high_speed")
                                             .removeClass("middle_high_speed")
                                             .removeClass("middle_low_speed")
                                             .removeClass("low_speed")
                                             .addClass(new_speed_class);
                            }
                        });
                        
                        $("#vynil_speed_right").change(function(){
                            var new_speed_class = getSpeedClass( parseInt( $("#vynil_speed_right").val() ) );
                            if( !$("#background_sound_right").hasClass( new_speed_class ) ){
                                $("#background_sound_right").removeClass("high_speed_background")
                                                           .removeClass("middle_high_speed_background")
                                                           .removeClass("middle_low_speed_background")
                                                           .removeClass("low_speed_background")
                                                           .addClass(new_speed_class+"_background");
                            }
                            
                            var vynil_right = $("#turntable_right").find(".vynil");
                            if( !$(vynil_right).hasClass( new_speed_class ) ){
                                $(vynil_right).removeClass("high_speed")
                                             .removeClass("middle_high_speed")
                                             .removeClass("middle_low_speed")
                                             .removeClass("low_speed")
                                             .addClass(new_speed_class);
                            }
                        });
                        
                        $("#vynil_selector_range").change(function(){
                            var new_volume_class = getVolumeClass( parseInt( $("#vynil_selector_range").val() ) );
                            if( !$("#background_sound").hasClass( new_volume_class ) ){
                                $("#background_sound").removeAttr('class')
                                                      .addClass(new_volume_class);
                            }
                        });
                        
                        function handleMouseMove(e, scratched_vynil, background){
                            var offset = $(scratched_vynil).offset();
                            var center_x = (offset.left) + ($(scratched_vynil).width() / 2);
                            var center_y = (offset.top) + ($(scratched_vynil).height() / 2);
                            var mouse_x = e.pageX;
                            var mouse_y = e.pageY;
                            var radians = Math.atan2(mouse_x - center_x, mouse_y - center_y);
                            var degree = (radians * (180 / Math.PI) * -1) + 90;
                            
                            $(scratched_vynil).css('-moz-transform', 'rotate(' + degree + 'deg)');
                            $(scratched_vynil).css('-webkit-transform', 'rotate(' + degree + 'deg)');
                            $(scratched_vynil).css('-o-transform', 'rotate(' + degree + 'deg)');
                            $(scratched_vynil).css('-ms-transform', 'rotate(' + degree + 'deg)');
                            $(scratched_vynil).css('transform', 'rotate(' + degree + 'deg)');
                            
                            var opacity_value = $(background).css("opacity");
                            opacity_value = opacity_value - 0.02;
                            if(opacity_value < 0){
                                opacity_value = 1;
                            }
                            $(background).css("opacity", opacity_value);
                        }
                        
                        $(".vynil_on_plate").mousedown(function(){
                            if( $(this).parent().parent().parent().attr("id") == "turntable_left" ){
                                var background = $("#background_sound_left");
                            }else{
                                var background = $("#background_sound_right");
                            }
                            $(background).addClass("manual_speed");
                            
                            $(this).css("animation-play-state", "paused")
                                   .removeClass("vynil_rotation_on")
                                   .bind('mousemove', function(event){
                                        handleMouseMove(event, this, background);
                                    });
                        });
                        
                        $(".vynil_on_plate").mouseup(function(){
                            $(this).css("animation-play-state", "")
                                   .addClass("vynil_rotation_on")
                                   .unbind('mousemove');
                            
                            if( $(this).parent().parent().parent().attr("id") == "turntable_left" ){
                                var background = $("#background_sound_left");
                            }else{
                                var background = $("#background_sound_right");
                            }
                            $(background).removeClass("manual_speed");
                        });
                        /** INTERACTIONS **/
                    }, 2000);
                }
            });
        }
    });
    /** ON / OFF **/
});