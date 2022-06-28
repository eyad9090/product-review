@if(session()->has('success-update'))
    <script type="text/javascript">
        swal("Good job!", "You has updated your account successfully", "success");
    </script>
@endif
@if(session()->has('fails-update'))
    <script type="text/javascript">
        swal("Cancelled", "Your email was already used", "error");
    </script>
@endif
@if(session()->has('fails-search'))
    <script type="text/javascript">
        swal("Cancelled", "Your model was already used", "error");
    </script>
@endif