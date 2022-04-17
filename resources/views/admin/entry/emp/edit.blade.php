@extends('layouts.master')

@section('body-contents')
<div class="container">
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Employees</h5>
                    <form class="needs-validation" method="POST" action="{{ route('employees.update.data', ['id'=>$employee->id]) }}" enctype="multipart/form-data" novalidate> @csrf()
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="emp_name">Employee Name</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name" value="{{ $employee->name }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="emp_name">Employee Department</label>
                                <select id="dept_id" name="dept_id" class="form-control custom-select">
                                    <option value="{{ $employee->department->id }}" selected>{{ $employee->department->name }}</option>
                                    @forelse($departments as $department)
                                    <option value="{{$department->id}}">{{ $department->name }}</option>
                                    @empty
                                    <option value="">No department added</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="emp_name">Cadre</label>
                                <select id="emp_cadre" name="emp_cadre" class="form-control custom-select">
                                    <option value="{{ $employee->cadre->id }}" selected>{{ $employee->cadre->name }}</option>
                                    @forelse($cadres as $cadre)
                                    <option value="{{$cadre->id}}">{{ $cadre->name }}</option>
                                    @empty
                                    <option value="">No Cadre added</option>
                                    @endforelse                                
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="emp_design">Employee Designation</label>
                                <select id="emp_design" name="emp_design" class="form-control custom-select">
                                    <option value="{{ $employee->designation->id }}" selected>{{ $employee->designation->name }}</option>
                                    @forelse($designations as $designation)
                                    <option value="{{$designation->id}}">{{ $designation->name }}</option>
                                    @empty
                                    <option value="">No Designation added</option>
                                    @endforelse  
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="emp_cph">Employee Present Posting</label>
                                <input type="text" class="form-control" id="emp_pp" name="emp_pp" value="{{ $employee->posting_place }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="emp_dob">Employee Date of Birth</label>
                                <input type="date" class="form-control" id="emp_dob" name="emp_dob" value="{{ $employee->dateof_birth }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="emp_design">Employee DO Initial Appoinmnet</label>
                                <input type="date" class="form-control" id="emp_doia" name="emp_doia" value="{{ $employee->dateof_initial_appointment }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="emp_cph">Employee Date of Promotion</label>
                                <input type="date" class="form-control" id="emp_dop" name="emp_dop" value="{{ $employee->dateof_promotion }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="emp_cph">Employee Picture</label>
                                <input type="file" class="form-control" id="emp_pic" name="emp_pic" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('data-entry') }}" class="btn btn-secondary" type="submit">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection