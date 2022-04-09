@extends('layouts.master')

@section('body-contents')
<div class="container">
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Department</h5>
                    <form class="needs-validation" method="post" action="{{ route('departments.update', ['id'=>$departments->id]) }}" novalidate> @csrf()
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="dept_name">Name of Department</label>
                                <input type="text" class="form-control" id="dept_name" name="dept_name" placeholder="e.g. Education, Health" value="{{ $departments->name }}" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                            <select id="dept_status" name="dept_status" class="form-control custom-select">
                                    <option selected value="{{ $departments->status }}">{{ ucfirst($departments->status) }}</option>
                                    <option value="active">Active</option>
                                    <option value="deactive">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('departments') }}" class="btn btn-secondary" type="submit">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection