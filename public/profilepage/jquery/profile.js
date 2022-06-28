function changePhoto($image) {
    const choosedFile = $image.files[0];
    if(choosedFile) {
        const reader = new FileReader();
        reader.readAsDataURL(choosedFile);
        reader.addEventListener("load",function(){
            document.getElementById("profile-image").setAttribute("src",reader.result);
        });
        // alert(document.getElementById("profile-image").getAttribute("src"));
        var image=document.getElementById("profile-image").getAttribute("src");
        var id =document.getElementById("id").getAttribute("value");
        // ajax
    }
}