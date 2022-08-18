@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible show fade" role="alert">
    <div class="alert-body">
        <button class="close" data-dismiss="alert" aria-label="close">
            <span>&times;</span>
        </button>
        {{$message}}
    </div>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-primary alert-dismissible show fade" role="alert">
    <div class="alert-body">
        <button class="close" data-dismiss="alert" aria-label="close">
            <span>&times;</span>
        </button>
        {{$message}}
    </div>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible show fade" role="alert">
    <div class="alert-body">
        <button class="close" data-dismiss="alert" aria-label="close">
            <span>&times;</span>
        </button>
        {{$message}}
    </div>
</div>
@endif