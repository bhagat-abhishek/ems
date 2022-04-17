@extends('layouts.master')

@section('body-contents')
<div class="container">
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update User</h5>
                    <form class="needs-validation" method="POST" action="{{ route('users.update', ['id'=>$user->id]) }}" novalidate>
                        @csrf()
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="">Name of User</label>
                                <input type="text" class="form-control" id="u_name" name="u_name" placeholder="e.g. Ram Sharma" value="{{ $user->name }}" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="u_email" name="u_email" placeholder="e.g. ram@ems.com" value="{{ $user->email }}" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="">Role</label>
                                <select  name="u_role" id="u_role" class="form-control custom-select">
                                    @if($user->role == 1)
                                    <option value="{{ $user->role }}" selected>Moderator</option>
                                    @elseif($user->role == 2)
                                    <option value="{{ $user->role }}" selected>Data Entry Operator</option>
                                    @endif
                                    <option value="1">Moderator</option>
                                    <option value="2">Data Entry Operator</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection