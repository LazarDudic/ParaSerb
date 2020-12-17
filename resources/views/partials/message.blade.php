@if($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
