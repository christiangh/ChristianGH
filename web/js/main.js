/** FUNCTIONS **/
function positioningNav(){
    var menu_height = $("#note_book_title").height()+24+22;
    var scroll_top = $(window).scrollTop();
    var scroll_bottom = $(window).scrollTop()+$(window).height();
    
    if (scroll_top >= menu_height){
        if(!$("nav").hasClass("fixed")){
            $("nav").removeClass("relative").addClass("fixed");
        }
    } else {
        if(!$("nav").hasClass("relative")){
            $("nav").removeClass("fixed").addClass("relative");
        }
    }
}

function clean_underlines(){
    $(".underlined").removeClass('underlined').addClass('underline')
}

function underlining(){
    var menu_height = $("#note_book_title").height()+24+22;
    var first_foil_height = $("#main_picture").parent().height();
    var scroll_top = $(window).scrollTop();
    var scroll_bottom = $(window).scrollTop()+$(window).height();
    
    if (scroll_bottom >= (menu_height+600)){
        var time = 0;
        $(".underline").each(function(index, element){
            setTimeout( function(){ $(element).removeClass('underline').addClass('underlined'); }, time)
            time += 2000;
        });
        window['underlining']=function(){null}
    }
}
/** FUNCTIONS **/

$(function() {
    /* Start */
    //Positioning Nav
    positioningNav();
    
    //Underlining
    clean_underlines();
    underlining();
    /* Start */
    
    $(window).scroll(function() {
        //Positioning Nav
        positioningNav();
        
        //Underlining
        underlining();
    });
    
    //Changing nav selector
    $("#section_select").change(function(){
        window.location.href = $(this).val();
    });
    
});