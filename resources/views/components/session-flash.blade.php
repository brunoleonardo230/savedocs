@php
    if (session()->has("success")) {
        $class = "success";
        $message = session("success");

    } elseif (session()->has("danger")) {
        $class = "danger";
        $message = session("danger");
    }
@endphp

@if (session()->has("success") || session()->has("danger"))
    <div class="alert alert-{{$class}} alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif