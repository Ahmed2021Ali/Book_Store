@if (session()->has('success'))
    <script>
        toastr.options = {
            "progessBar": true,
            "closeButton": true,
        }
        toastr.success("{{ session()->get('success') }}", '!ناجح', {
            timeOut: 12000
        });
    </script>
@elseif(session()->has('error'))
    <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
    <script>
        toastr.options = {
            "progessBar": true,
            "closeButton": true,
        }
        toastr.error("{{ session()->get('error') }}", '!خطأ', {
            timeOut: 12000
        });
    </script>
@endif
