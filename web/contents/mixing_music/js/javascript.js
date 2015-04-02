
$(function() {
    /** ON / OFF **/
    $("#turn_on").click(function(){
        if($(this).hasClass("on")){
            $(this).removeClass("on")
                   .addClass("off");
            
            $(".needle").removeClass("needle_on");
            $(".needle").removeClass("needle_running");
            $(".vynil").removeClass("vynil_ratation_on");
        }else{
            $(this).removeClass("off")
                   .addClass("on");
            
            $(".needle").addClass("needle_on");
                        
            //If the turntable has a vynil... let's go!
            $(".turntable").each(function(index, turntable){
                if( $(turntable).find(".vynil").length > 0 ){
                    $(turntable).find(".needle").addClass("needle_running");
                    $(turntable).find(".vynil").addClass("vynil_ratation_on");
                }
            });
        }
    });
    /** ON / OFF **/
});