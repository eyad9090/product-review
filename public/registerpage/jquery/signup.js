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
        $("#password_confirmation").attr("type","text");
        $(".eye1").css({"display":"none"});
        $(".eye2").css({"display":"block"});
    }
    else
    {
        $("#password").attr("type","password");
        $("#password_confirmation").attr("type","password");
        $(".eye1").css({"display":"block"});
        $(".eye2").css({"display":"none"});
    }
}
function check(event)
{
    if($(".signup").attr("data-flag")=="0")
    {
        event.preventDefault();
        $password=$("#password").val();
        $confirm=$("#password_confirmation").val();
        if($password==$confirm)
        {
            $(".signup").attr("data-flag","1");
            $(".signup").submit();
        }
        else
        {
            $("#wrong").css({"display":"block"});
            $(".eye4").css({"top":"35%"});
        }
    }
}

function hideErrors()
{
    $(".invalid-feedback").text("");
}