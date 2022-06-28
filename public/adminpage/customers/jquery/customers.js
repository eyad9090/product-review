window.onload = function() {
    formHide();
};

function formHide()
{
    $("#customer").css({"display":"none"});  
}
function formShow()
{
    $("#customer").css({"display":"block"});  
}
function editCustomer(itemId)
{
    formShow();
    fillCustomer(itemId);
    
}
function fillCustomer(itemId)
{
    $("#customer-id").val($(itemId).closest("tr").find("td:eq(0)").text());
    $("#customer-image").attr("src",$(itemId).closest("tr").find("td:eq(1) img").attr("src"));
    $("#customer-name").val($(itemId).closest("tr").find("td:eq(2)").text());
    $("#customer-email").val($(itemId).closest("tr").find("td:eq(3)").text());
}


function deleteCustomer(form,itemId)
{
    $flag=$(itemId).attr('data-flag');
    if($flag==0)
    {
        form.preventDefault();
        swal({
            title: "Delete Customer",
            text: "Are you sure you will not be able to retore the account",
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
                    text: 'You have deleted the customer successfully!',
                    icon: 'success'
                }).then(function () {
                    $(itemId).attr('data-flag', '1');
                    $(itemId).submit();
                });
            }
            else {
                swal("Cancelled", "Your customer record is safe :)", "error");
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
            document.getElementById("customer-image").setAttribute("src",reader.result);
        });
    }
}
