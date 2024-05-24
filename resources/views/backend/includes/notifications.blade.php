<!-- ALL ERROR ALERT MESSAGE -->



@if (count($errors->all()) > 0)
    <div class="alert alert-danger alert-block alert-dismissible">
        <i class="fa fa-exclamation-triangle fa-xs fa-beat"></i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Error!</strong>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block session-box alert-dismissible">
        <i class="fa fa-check"></i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Success!</strong>
        <span class="msg-content">
            @if (is_array($message))
                <ul>
                    @foreach ($message as $m)
                        <li>{!! $m !!}</li>
                    @endforeach
                </ul>
            @else
                {!! $message !!}
            @endif
        </span>
    </div>
@endif


<!-- ERROR ALERT MESSAGE -->
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block session-box alert-dismissible">
        <i class="fa fa-exclamation-triangle fa-xs fa-beat"></i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Error!</strong>
        <span class="msg-content">
        @if (is_array($message))
            <ul>
                @foreach ($message as $m)
                    <li>{!! $m !!}</li>
                @endforeach
            </ul>
        @else
            {!! $message !!}
        @endif
        </span>
    </div>
@endif





<!--ajax response message-->
<div class="alert alert-danger d-none alert-dismissible">
    <i class="fa fa-exclamation-triangle fa-xs fa-beat"></i>
    <button type="button" class="btn-close" aria-label="Close"></button>
    <span class="msg-content"></span>
</div>
<div class="alert alert-success d-none alert-dismissible">
    <i class="fa fa-check"></i>
    <button type="button" class="btn-close" aria-label="Close"></button>
    <span class="msg-content"></span>
</div>
<div class="alert alert-info d-none alert-dismissible">
    <i class="fa fa-info"></i>
    <button type="button" class="btn-close" aria-label="Close"></button>
    <span class="msg-content"></span>
</div>
<div class="alert alert-warning d-none alert-dismissible">
    <i class="fa fa-warning"></i>
    <button type="button" class="btn-close" aria-label="Close"></button>
    <span class="msg-content"></span>
</div>
<!--Ajax response message over-->
