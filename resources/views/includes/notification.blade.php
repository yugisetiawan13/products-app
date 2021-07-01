@if (session('success-msg'))
    <div class="alert alert-primary" role="alert">
        {{ session('success-msg') }}
    </div>
@endif

@if (session('error-msg'))
    <div class="alert alert-danger" role="alert">
        {{ session('error-msg') }}
    </div>
@endif