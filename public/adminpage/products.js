$( document ).ready(function() {
    readOnlyInputs();
});
function priceOutput(val)
{
    document.getElementById("max-range").value=val;
}
function fillProduct(itemId)
{
    $("#product-id").val(parseInt($(itemId).closest("tr").find("td:eq(0)").text()));
    $("#product-image").attr("src",$(itemId).closest("tr").find("td:eq(1) img").attr("src"));
    $("#product-model").val($(itemId).closest('tr').find("td:eq(3)").text());
}
function deleteProduct(form,itemId)
{
    $flag=$(itemId).attr('data-flag');
    if($flag==0)
    {
        form.preventDefault();
        swal({
            title: "Delete Prodcut",
            text: "Are you sure you will not be able to retore the product",
            icon: "warning",
            buttons: [
                'No, cancel it!',
                'Yes, I am sure!'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {
                swal({
                    title: 'Deleted!',
                    text: 'You have deleted the product successfully!',
                    icon: 'success'
                }).then(function () {
                    $(itemId).attr('data-flag', '1');
                    $(itemId).submit();
                });
            }
            else {
                swal("Cancelled", "Your product is safe :)", "error");
            }
        })
    }
}
function changePhoto($image) {
    const choosedFile = $image.files[0];
    if(choosedFile) {
        const reader = new FileReader();
        reader.readAsDataURL(choosedFile);
        reader.addEventListener("load",function(){
            document.getElementById("product-image").setAttribute("src",reader.result);
        });
    }
}
function readOnlyInputs() {
    $("#productsTable :input").each(function(){
        $(this).attr("readonly",true);
    });
    $("#productsTable input[type=submit]").css({"display":"none"});
}

function openInputs() {
    $("#productsTable :input").each(function(){
        $(this).attr("readonly",false);
    });
    $("#productsTable input[type=submit]").css({"display":"block"});
}