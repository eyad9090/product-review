@if(session()->has('success'))
    <script type="text/javascript">
        swal("Good job!", "You record has been updated", "success");
    </script>
@endif
@if(session()->has('fails'))
    <script type="text/javascript">
        swal("Cancelled", "Your email was already used", "error");
    </script>
@endif