/** FUNCTIONS **/
var highlighted_started = 0;
function highlighting(){
    var menu_height = $("#note_book_title").height()+24+22;
    var first_foil_height = $("#main_picture").parent().height();
    var scroll_top = $(window).scrollTop();
    var scroll_bottom = $(window).scrollTop()+$(window).height();
    
    if (scroll_bottom >= (menu_height+600) && !highlighted_started){
        highlighted_started = 1;
        $(".highlight").highlighter();
    }
}
/** FUNCTIONS **/

$(function() {
    /* Start */
    //Highlighting
    $(".highlight").highlighter('clear');
    highlighting();
        
    $(window).scroll(function() {
        //Highlighting
        highlighting();
    });
    
});