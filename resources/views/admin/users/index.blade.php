@extends('layouts.admin', ['title' => 'Users'])

@section('content')
<div class="container">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fa fa-users mr-1"></i>
                Users
            </div>
            <div>
                @can('admin-access')
                    <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
                @endcan
            </div>
        </div>


        <div class="card-body">
            @include('partials.message')
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                        @can('admin-access') <th>Action</th> @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role)  }}</td>
                            <td>{{ $user->created_at }}</td>
                            @can('admin-access')
                                <td class="d-flex">

                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="btn btn-info mr-2" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <livewire:admin.users.delete-user :user="$user"/>
                                </td>
                            @endcan

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
