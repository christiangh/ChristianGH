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
/** FUNCTIONS **/

$(function() {
    /* Start */
    //Positioning Nav
    positioningNav();
        
    $(window).scroll(function() {
        //Positioning Nav
        positioningNav();
    });
    
    //Changing nav selector
    $("#section_select").change(function(){
        window.location.href = $(this).val();
    });
    
});