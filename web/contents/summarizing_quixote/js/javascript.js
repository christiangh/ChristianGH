var time = 0;


$(function() {
    $(".quixote_underline").each(function(index, element){
        setTimeout( function(){ $(element).removeClass('quixote_underline').addClass('quixote_underlined'); }, time)
        time += 3000;
    });
});