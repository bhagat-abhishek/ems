@extends('layouts.master')

@section('body-contents')
<div class="container">

    @if(session()->has('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success m-b-lg" role="alert">
            {{ session()->get('success') }}
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('failed'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger m-b-lg" role="alert">
            {{ session()->get('failed') }}
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add User</h5>
                    <form class="needs-validation" method="POST" action="{{ route('users.store') }}" novalidate>
                        @csrf()
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="">Name of User</label>
                                <input type="text" class="form-control" id="u_name" name="u_name" placeholder="e.g. Ram Sharma" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="u_email" name="u_email" placeholder="e.g. ram@ems.com" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="">Role</label>
                                <select  name="u_role" id="u_role" class="form-control custom-select">
                                    <option value="1">Moderator</option>
                                    <option value="2">Data Entry Operator</option>
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="">Password</label>
                                <input type="password" class="form-control" id="u_password" name="u_password" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Users</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl. No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if($user->role == 0)
                                    <td><span class="badge badge-info">Super Admin</span></td>
                                    @elseif($user->role == 1)
                                    <td><span class="badge badge-info">Moderator</span></td>
                                    @elseif($user->role == 2)
                                    <td><span class="badge badge-info">Data Entry</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('users.edit', ['id'=>$user->id ]) }}"><span class="badge badge-success">Edit</span></a>
                                        @if($user->role != 0)
                                        <a href="{{ route('users.delete', ['id'=>$user->id ]) }}"><span class="badge badge-danger">Delete</span></a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="4">No Users yet.</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection