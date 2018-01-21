<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>--}}
            {{--<script>--}}
                {{--toastr.options = {--}}
                    {{--"closeButton": false,--}}
                    {{--"debug": false,--}}
                    {{--"newestOnTop": false,--}}
                    {{--"progressBar": false,--}}
                    {{--"positionClass": "toast-top-right",--}}
                    {{--"preventDuplicates": false,--}}
                    {{--"onclick": null,--}}
                    {{--"showDuration": "300",--}}
                    {{--"hideDuration": "1000",--}}
                    {{--"timeOut": "5000",--}}
                    {{--"extendedTimeOut": "1000",--}}
                    {{--"showEasing": "swing",--}}
                    {{--"hideEasing": "linear",--}}
                    {{--"showMethod": "fadeIn",--}}
                    {{--"hideMethod": "fadeOut"--}}
                {{--}--}}
            {{--</script>--}}
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif
        </div>
        <div class="col-lg-6 col-lg-offset-3">
            @if(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
        </div>
    </div>
</div>
