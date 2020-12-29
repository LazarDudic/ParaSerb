@extends('layouts.admin', ['title' => 'Users'])

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active">{{ isset($user) ? 'Edit user' : 'Add User' }}</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-10 col-sm-12 m-auto">
                <div class="card mb-5">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        {{ isset($user) ? 'Edit User' : 'Add User' }}
                    </div>
                    <div class="card-body">
                        @include('partials.message')
                        <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
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
                                <label for="name">{{ isset($user) ? 'New ' : '' }}Password:</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                                @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="name">{{ isset($user) ? 'New ' : '' }}Password Confirm:</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>

                            <div>
                                <select class="custom-select custom-select @error('role') is-invalid @enderror" name="role">
                                    <option disabled selected>Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="moderator">Moderator</option>
                                </select>
                                @error('role')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>


                            <button type="submit" class="btn btn-primary mt-2">{{ isset($user) ? 'Update' : 'Add user' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
