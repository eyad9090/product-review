window.onload = function() {
    $type=$("#types").val();
    chooseTable($type);
    chooseFilter($type);
    defaultFooter();
};




function defaultFooter()
{
    // alert("hello1");
    $(".table-footer").css({"display":"none"});
}


function chooseFilter(type)
{
    if(type == "all")
    {
        // filter
        $(".device").css({"display":"none"});
        $(".mobile").css({"display":"none"});
        $(".tv").css({"display":"none"});
        $(".table-header form").css({"grid-template-columns":"repeat(auto-fill,minmax(200px,1fr))"});
    }
    else if(type == "laptop")
    {
        // filter
        $(".device").css({"display":"flex"});
        $(".mobile").css({"display":"none"});
        $(".tv").css({"display":"none"});
        $(".table-header form").css({"grid-template-columns":"repeat(auto-fill,minmax(250px,1fr))"});
    }
    else if (type == "mobile")
    {
        // filter
        $(".mobile").css({"display":"flex"});
        $(".device").css({"display":"none"});
        $(".ram").css({"display":"flex"});
        $(".tv").css({"display":"none"});
        $(".table-header form").css({"grid-template-columns":"repeat(auto-fill,minmax(300px,1fr))"});
    }
    else if(type == "television")
    {
        // filter
        $(".tv").css({"display":"flex"});
        $(".mobile").css({"display":"none"});
        $(".device").css({"display":"none"});
        $(".table-header form").css({"grid-template-columns":"repeat(auto-fill,minmax(350px,1fr))"});
    }
}
function chooseTable(type) {
    if(type == "all")
    {
        // table name
        $(".table-name").text("products");
        // table
        $(".products").css({"display":"table"});
        $(".laptops").css({"display":"none"});
        $(".mobiles").css({"display":"none"});
        $(".tvs").css({"display":"none"});
    }
    else if(type == "laptop")
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
function chooseFooter(type)
{
    if(type == "laptop")
    {
        //footer inputs
        $('.product-device').css({"display":"flex"});
        $('.product-mobile').css({"display":"none"});
        $('.product-tv').css({"display":"none"});
        // footer required
        $('.product-tv input').prop('required',false);
        $('.product-device input').prop('required',true);
        $('.product-mobile input').prop('required',false);
        $('.product-tv input').prop('required',false);
        $(".table-footer form .inputs").css({"grid-template-columns":"repeat(auto-fill,minmax(250px,1fr))"});
    }
    else if (type == "mobile")
    {
        //footer inputs
        $('.product-device').css({"display":"none"});
        $('.product-ram').css({"display":"flex"});
        $('.product-mobile').css({"display":"flex"});
        $('.product-tv').css({"display":"none"});
        //required
        $('.product-tv input').prop('required',false);
        $('.product-device input').prop('required',false);
        $('.product-ram input').prop('required',true);
        $('.product-mobile input').prop('required',true);
        $(".table-footer form .inputs").css({"grid-template-columns":"repeat(auto-fill,minmax(350px,1fr))"});
    }
    else if(type == "television")
    {
        //footer inputs
        $('.product-device').css({"display":"none"});
        $('.product-mobile').css({"display":"none"});
        $('.product-tv').css({"display":"flex"});
        // required
        $('.product-tv input').prop('required',true);
        $('.product-device input').prop('required',false);
        $('.product-mobile input').prop('required',false);
        $(".table-footer form .inputs").css({"grid-template-columns":"repeat(auto-fill,minmax(350px,1fr))"});
    }
}
function paginationHide(type) {
    $productsTable=$('.products').css('display');
    $laptopsTable=$('.laptops').css('display');
    $mobilesTable=$('.mobiles').css('display');
    $televisionsTable=$('.tvs').css('display');
    if(type=="all"&&$productsTable=="table")
    {
        $(".links-pagination").css("display","block");
    }
    else if(type=="laptop"&&$laptopsTable=="table")
    {
        $(".links-pagination").css("display","block");
    }
    else if(type=="mobile"&&$mobilesTable=="table")
    {
        $(".links-pagination").css("display","block");
    }   
    else if(type=="television"&&$televisionsTable=="table")
    {
        $(".links-pagination").css("display","block");
    }
    else
    {
        $(".links-pagination").css("display","none");
    }
}
function emptyFooterInputs(type)
{
    if(type == "laptop")
    {
        $(".product-mobile input").val("");
        $(".product-tv input").val("");
    }
    else if(type == "mobile")
    {
        $(".product-processor input").val("");
        $(".product-gpu input").val("");
        $(".product-tv input").val("");
    }
    else if(type == "television")
    {
        $(".product-device input").val("");
        $(".product-mobile input").val("");
    }
}


function submitTable(event) 
{
    var type=$("#product-type").val();
    emptyFooterInputs(type);
    var flag = $("#productsTable").attr("data-flag");
    if(flag==0)
    {
        $flag=$('#productsTable').attr('data-flag');
        if(flag==0)
        {
            event.preventDefault();
        }
        swal("Good job!", 
            "You Edited item suceesfully!", 
            "success").then(function(){
                $('#productsTable').attr('data-flag', '1');
                $('#productsTable').submit();
            });
    }
    return true;
}
function filterAndTable(type)
{
    chooseFilter(type);
    chooseTable(type);
    paginationHide(type);
}
function priceOutput(val)
{
    document.getElementById("max-range").value=val;
}
function fillProduct(itemId)
{
    $("#product-id").val(parseInt($(itemId).closest("tr").find("td:eq(0)").text()));
    $("#product-image").attr("src",$(itemId).closest("tr").find("td:eq(1) img").attr("src"));
    $("#product-type").val($(itemId).closest("tr").find("td:eq(2)").text());
    $("#product-model").val($(itemId).closest('tr').find("td:eq(3)").text());
}
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
function fillTelevision(itemId)
{
    var fullScreen=$(itemId).closest('tr').find("td:eq(4)").text();
    var Screen = fullScreen.split(" ");
    $("#product-screen-size").val(parseInt(Screen[0]));
    var fullPrice=$(itemId).closest('tr').find("td:eq(5)").text();
    var price=fullPrice.split(" ");
    $("#product-price").val(parseInt(price[0]));
}

function showFooter()
{
    $(".table-footer").css({"display":"block"});
}
function hideFooter()
{
    $(".table-footer").css({"display":"none"});
}
// products
function editProduct(itemId)
{
    fillProduct(itemId);
    var type = $(itemId).closest('tr').find("td:eq(2)").text();
    chooseFooter(type);
    showFooter();
    if(type == "laptop")
    {
        fillLaptop(itemId);
    }
    else if(type == "mobile")
    {
        fillMobile(itemId);
    }
    else if(type == "television")
    {
        fillTelevision(itemId);
    }
}
function deleteProduct(form,itemId)
{
    $flag=$(itemId).attr('data-flag');
    // alert($flag);
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
