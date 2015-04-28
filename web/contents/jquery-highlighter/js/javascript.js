$(function() {
    /** MENU TABS **/
    $("#tab_menu .tab_to_select").removeClass("selected");
    $("#tab_demo").addClass("selected");
    $("#tab_installation_content").hide();
    $("#tab_documentation_content").hide();
    $("#tab_download_content").hide();
    
     $("#tab_menu .tab_to_select").click(function(){
        var selected_tab = $(this);
        
        $("#tab_menu li").removeClass("selected");
        selected_tab.addClass("selected");
        
        $(".tab_content").hide();
        $("#"+selected_tab.attr("id")+"_content").show();
     });
    /** MENU TABS **/
    
    //Clearing previous highlights
    $("#quixote_title span").highlighter('clear');
    $("#first_block span").highlighter('clear');
    $("#second_block span").highlighter('clear');
    
    //GO!
    $("#quixote_title span").highlighter();
    
    $(this).each(function(index, element){
        if(!$(element).hasClass('highlighter_go')){
            setTimeout( function(){
                $("#first_block span").highlighter({
                    'queue' : true,
                    'pauseTime' : 500,
                    'duration': 2000,
                    'timing': 'ease-in-out',
                    'colorFrom': 'transparent',
                    'colorTo': '#FA58F4'
                });
            }, 4000);
        }
    });
    
    $(this).each(function(index, element){
        if(!$(element).hasClass('highlighter_go')){
            setTimeout( function(){
                $("#second_block span").highlighter({
                    'queue' : false,
                    'pauseTime' : 0,
                    'duration': 10000,
                    'timing': 'linear',
                    'colorFrom': 'transparent',
                    'colorTo': '#FF9B00'
                });
            }, 17000);
        }
    });
});