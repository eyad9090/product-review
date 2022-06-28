window.onload = function() {
    type=$("#types").val();
    chooseTable(type);
};


function chooseTable(type) {
    $(".title").css({"display":"flex"});
    if(type == "laptop")
    {
        // table name
        $(".table-name").text("laptops");
        // table
        $(".laptops").css({"display":"table"});
        $(".products").css({"display":"none"});
        $(".mobiles").css({"display":"none"});
        $(".tvs").css({"display":"none"});
    }
    else if (type == "mobile")
    {
        // table name
        $(".table-name").text("mobiles");
        // table
        $(".mobiles").css({"display":"table"});
        $(".laptops").css({"display":"none"});
        $(".products").css({"display":"none"});
        $(".tvs").css({"display":"none"});
    }
    else if(type == "television")
    {
        // table name
        $(".table-name").text("televisions");
        // table
        $(".tvs").css({"display":"table"});
        $(".laptops").css({"display":"none"});
        $(".mobiles").css({"display":"none"});
        $(".products").css({"display":"none"});
    }
}