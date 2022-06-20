<!-- BEGIN: Alert/Notification -->
@if(session('success'))
<div class="alert alert-success" role="alert">
    <i class="ni ni-check-bold"></i>
    <strong> {{session('success')}}</strong>
</div>
@elseif(session('warning'))
<div class="alert alert-warning" role="alert">
    <i class="ni ni-sound-wave"></i>
    <strong> {{session('warning')}}</strong>
</div>
@elseif(session('error') || isset($error))
<div class="alert alert-danger" role="alert">
    <i class="ni ni-fat-remove"></i>
    <strong> {{isset($error) ? $error : session('error')}}</strong>
</div>
@elseif($errors->any())
<div class="alert alert-danger py-1" role="alert">
    <strong>
        <ul class="mb-0" style="list-style-type:none;">
            @foreach ($errors->all() as $item)
                <li>
                    <strong> {{ $item }}</strong>
                </li>
            @endforeach
        </ul>
    </strong>
</div>
@endif
<!-- END: Alert/Notification -->
