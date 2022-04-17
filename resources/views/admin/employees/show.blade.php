@extends('layouts.master')

@section('body-contents')
<div class="container">
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-lg">
                            <div class="profile-img img-responsive">
                                <img src="{{ asset($employee['image_url']) }}" style="width: 300px;">
                            </div>
                        </div>
                        <div class="col-xl-lg">
                            <div class="row">
                                <div class="col ml-4">
                                    <h6>EMP ID: {{ ucwords($employee['emp_unique_id']) }}</h6>
                                    <h2>{{ ucfirst($employee['name']) }}</h1>
                                    <h5>DEPARTMENT: <strong>{{ ucfirst($employee->department['name']) }}</strong></h5>
                                    <h5>DESIGNATION: <strong>{{ ucfirst($employee->designation['name']) }}</strong></h5>
                                    <h5>CADRE: <strong>{{ ucfirst($employee->cadre['name']) }}</strong></h5>
                                    <h5>DOB: <strong>{{ ucfirst($employee['dateof_birth']) }}</strong></h5>
                                    <h5>CURRENT POST HELD: <strong>{{ ucfirst($employee['posting_place']) }}</strong></h5>
                                    <h5>INITIAL APPOINMENT DATE: <strong>{{ ucfirst($employee['dateof_initial_appointment']) }}</strong></h5>
                                    <h5>RETIREMENT DATE: <strong>{{ ucfirst($employee['dateof_retirement']) }}</strong></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('employees') }}" class="btn btn-info">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection