@extends('layouts.admin', ['title' => 'User Profile'])

@section('content')
    <div class="container">
        <h1 class="mt-4">{{ $user->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('profile.show', $user->id) }}">Profile</a></li>
            <li class="breadcrumb-item active"></li>
        </ol>
        @include('partials.message')

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fa fa-user mr-1"></i>
                    Profile
                </div>
                <div>
                    @if(auth()->user()->id == $user->id)
                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-success">Edit Profile</a>
                    @endif
                </div>
            </div>
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>Name:</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Role:</th>
                    <td>{{ ucfirst($user->role)  }}</td>
                </tr>
                <tr>
                    <th>Created At:</th>
                    <td>{{ $user->created_at  }}</td>
                </tr>
            </table>


            <div class="card-body">
                <div class="table-responsive">

                </div>
            </div>
        </div>
    </div>
@endsection
