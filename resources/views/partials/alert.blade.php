@if(Session::has('message'))
<div class="container">
    <div class="alert alert-danger" role="alert">
        {{ Session::get('message') }}
    </div>
</div>
@endif
