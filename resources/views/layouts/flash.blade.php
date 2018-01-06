<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            @if(Session::has('success'))
                <script type="text/javascript">toastr["success"]('{!! session('success') !!}');</script>
            @endif
        </div>
        <div class="col-lg-6 col-lg-offset-3">
            @if(Session::has('error'))
                <script type="text/javascript">toastr["error"]('{!! session('error') !!}');</script>
            @endif
        </div>
    </div>
</div>
