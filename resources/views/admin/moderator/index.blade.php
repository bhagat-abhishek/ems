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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Employee Approvals</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl. No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Cadre Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Present Place of Posting</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Date_Of_Birth</th>
                                    <th scope="col">Date_Of_Initial_Appointment</th>
                                    <th scope="col">Date_Of_Promotion</th>
                                    <th scope="col">Date_Of_Retirement</th>
                                    <th scope="col">___Action___</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->cadre->name }}</td>
                                    <td>{{ $employee->designation->name }}</td>
                                    <td>{{ $employee->posting_place }}</td>
                                    <td>{{ $employee->department->name }}</td>
                                    <td>{{ $employee->dateof_birth }}</td>
                                    <td>{{ $employee->dateof_initial_appointment }}</td>
                                    <td>{{ $employee->dateof_promotion }}</td>
                                    <td>{{ $employee->dateof_retirement }}</td>
                                    <td>
                                        <a href="{{ route('mod.employees.approve', ['id'=>$employee->id ]) }}"><span class="badge badge-success">approve</span></a>
                                        <a href="{{ route('mod.employees.reject', ['id'=>$employee->id ]) }}"><span class="badge badge-danger">reject</span></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="4">No Employees to approve.</th>
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