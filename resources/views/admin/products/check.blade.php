@if(session()->has('success-update'))
    <script type="text/javascript">
        swal("Good job!", "You record has been updated", "success");
    </script>
@endif
@if(session()->has('success-add'))
    <script type="text/javascript">
        swal("Good job!", "You record has been added", "success");
    </script>
@endif
@if(session()->has('fails'))
    <script type="text/javascript">
        swal("Cancelled", "Your model was already used", "error");
    </script>
@endif