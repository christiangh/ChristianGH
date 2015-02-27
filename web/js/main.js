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
    //Start
    positioningNav();
    
    $(window).scroll(function() {
        positioningNav();
    });
    
    //Changing nav selector
    $("#section_select").change(function(){
        alert(1);
    });
    
});