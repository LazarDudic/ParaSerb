@extends('layouts.admin', ['title' => 'Edit Profile'])

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('profile.show', $user->id) }}">Profile</a></li>
            <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-10 col-sm-12 m-auto">
                <div class="card mb-5">
                    <div class="card-header">
                        <i class="fas fa-user mr-1"></i>Edit Profile
                    </div>
                    <div class="card-body">
                        @include('partials.message')
                        <form action="{{ route('profile.update', $user->id) }}" method="POST">
                            @csrf
                            @if(isset($user)) @method('PATCH') @endif

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ??  $user->name ?? '' }}">
                                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                            </div>
                            <div class="form-group">
                                <label for="email" >{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email ?? '' }}">
                                @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Password:</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') ??  $user->password ?? '' }}">
                                @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Password Confirm:</label>
                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('name') ??  $user->password ?? '' }}">
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">{{ isset($user) ? 'Update' : 'Add user' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
