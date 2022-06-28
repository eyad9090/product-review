function fillLaptop(itemId)
{
    var fullRam=$(itemId).closest('tr').find("td:eq(4)").text();
    var ram = fullRam.split(" ");
    $("#product-ram").val(parseInt(ram[0]));
    $("#product-processor").val($(itemId).closest('tr').find("td:eq(5)").text());
    $("#product-gpu").val($(itemId).closest('tr').find("td:eq(6)").text());
    var fullPrice=$(itemId).closest('tr').find("td:eq(7)").text();
    var price=fullPrice.split(" ");
    $("#product-price").val(parseInt(price[0]));
}

function editProduct(itemId)
{
    openInputs();
    fillProduct(itemId);
    fillLaptop(itemId);
}