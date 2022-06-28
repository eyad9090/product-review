function fillMobile(itemId)
{
    var fullRam=$(itemId).closest('tr').find("td:eq(4)").text();
    var ram = fullRam.split(" ");
    $("#product-ram").val(parseInt(ram[0]));
    var fullCamera=$(itemId).closest('tr').find("td:eq(5)").text();
    var Camera = fullCamera.split(" ");
    $("#product-camera").val(parseInt(Camera[0]));
    var fullPrice=$(itemId).closest('tr').find("td:eq(6)").text();
    var price=fullPrice.split(" ");
    $("#product-price").val(parseInt(price[0]));
}

function editProduct(itemId)
{
    openInputs();
    fillProduct(itemId);
    fillMobile(itemId);
}