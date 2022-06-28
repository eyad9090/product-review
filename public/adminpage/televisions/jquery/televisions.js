function fillTelevision(itemId)
{
    var fullScreen=$(itemId).closest('tr').find("td:eq(4)").text();
    var Screen = fullScreen.split(" ");
    $("#product-screen-size").val(parseInt(Screen[0]));
    var fullPrice=$(itemId).closest('tr').find("td:eq(5)").text();
    var price=fullPrice.split(" ");
    $("#product-price").val(parseInt(price[0]));
}

function editProduct(itemId)
{
    openInputs();
    fillProduct(itemId);
    fillTelevision(itemId);
}