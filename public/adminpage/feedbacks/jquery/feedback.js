window.onload = function() {
    setImages();
};

function setImages()
{
    $("img").each(function(){
        if($(this).attr("src")==="") {
            $(this).attr("src", "../admin/images/nouser.png");
        }
    });
}
function deleteReview(form,itemId)
{
    $flag=$(itemId).attr('data-flag');
    if($flag==0)
    {
        form.preventDefault();
        swal({
            title: "Delete Feedback",
            text: "Are you sure you will not be able to retore the feedback",
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
                    text: 'You have deleted the feedback successfully!',
                    icon: 'success'
                }).then(function () {
                    $(itemId).attr('data-flag', '1');
                    $(itemId).submit();
                });
            }
            else {
                swal("Cancelled", "Your feedback record is safe :)", "error");
            }
        })
    }
}