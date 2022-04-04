@extends('layouts.master')

@section('body-contents')
<div class="container">
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Employees</h5>
                    <form class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="emp_name">Employee Name</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="emp_name">Employee Department</label>
                                <select id="dept_id" name="dept_id" class="form-control custom-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="emp_name">Employee DOB</label>
                                <input type="date" class="form-control" id="emp_dob" name="emp_dob" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="emp_design">Employee Designation</label>
                                <input type="text" class="form-control" id="emp_design" name="emp_design" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="emp_cph">Employee Current Post Held</label>
                                <input type="text" class="form-control" id="emp_cph" name="emp_cph" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="emp_cadre">Employee Cadre</label>
                                <input type="text" class="form-control" id="emp_cadre" name="emp_cadre" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="emp_design">Employee DO Initial Appoinmnet</label>
                                <input type="date" class="form-control" id="emp_doia" name="emp_doia" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="emp_cph">Employee Picture</label>
                                <input type="file" class="form-control" id="emp_pic" name="emp_pic" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Add</button>
                        <a href="{{ route('employees') }}" class="btn btn-secondary" type="submit">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection