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
        <div class="col-lg-12 mb-4">
        <a href="{{ route('employees.add') }}" class="btn btn-success">Add Employee</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Employees</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl. No</th>
                                    <th scope="col">EMP ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Current Post</th>
                                    <th scope="col">Cadre</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">DO Initial Appoinment</th>
                                    <th scope="col">DO Birth</th>
                                    <th scope="col">DO Retirement</th>
                                    <th scope="col">Pic</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $employee->empid }}</td>
                                    <td>{{ $employee->emp_name }}</td>
                                    <td>{{ $employee->deptid }}</td>
                                    <td>{{ $employee->emp_designation }}</td>
                                    <td>{{ $employee->emp_current_post }}</td>
                                    <td>{{ $employee->emp_cadre }}</td>
                                    <td>{{ $employee->emp_salary }}</td>
                                    <td>{{ $employee->emp_do_initial_appoinmnet }}</td>
                                    <td>{{ $employee->emp_dob }}</td>
                                    <td>{{ $employee->emp_dor }}</td>
                                    <td>
                                        <img src="{{ asset($employee->emp_pic_url) }}" width="50px">
                                    </td>
                                    <td>
                                        <a href="{{ route('employees.edit', ['id'=>$employee->id]) }}" class="badge badge-success">Edit</a>
                                        <a href="{{ route('employees.delete', ['id'=>$employee->id]) }}" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12">No Employees added yet</td>
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