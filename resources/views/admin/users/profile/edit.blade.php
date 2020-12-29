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
                        <livewire:admin.users.profile.update-profile :user="$user" :key="$user->id" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
