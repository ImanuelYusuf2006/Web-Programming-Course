@if ($errors->any() || session('error_message'))
    <div class="alert alert-danger mt-3">
        {{-- {{ session('error_message') }} --}}
        <ul class="mb-8">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            @if(session('error_message'))
                <li>{{ session('error_message') }}</li>
            @endif
        </ul>
    </div>
@endif
