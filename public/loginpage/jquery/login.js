window.onload = function() {
    defaultEye();
};
function defaultEye() {
    $(".eye1").css({"display":"block"});
    $(".eye2").css({"display":"none"});
}
function showPassword()
{
    $type=$("#password").attr("type");
    if($type == "password")
    {
        $("#password").attr("type","text");
        $("#confirm-password").attr("type","text");
        $(".eye1").css({"display":"none"});
        $(".eye2").css({"display":"block"});
    }
    else
    {
        $("#password").attr("type","password");
        $("#confirm-password").attr("type","password");
        $(".eye1").css({"display":"block"});
        $(".eye2").css({"display":"none"});
    }
}

function hideErrors()
{
    $(".invalid-feedback").text("");
}