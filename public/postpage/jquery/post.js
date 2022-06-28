$(document).ready(function(){
    setStars();
});

function setStars()
{
    $("input[type=radio]").each(function(){
        if($(this).is(":checked")) {
            $(this.id+" ~ label").css({"color":"#ffc700"});
        }
    });
}