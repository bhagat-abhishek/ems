@extends('layouts.master')

@section('body-contents')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card stat-card">
                <div class="card-body">
                    <h5 class="card-title">Total Departments</h5>
                    <h2 class="float-right">{{ \App\Models\Department::count() }}</h2>
                    <p>All Department in state.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card">
                <div class="card-body">
                    <h5 class="card-title">Total Employees</h5>
                    <h2 class="float-right">{{ \App\Models\Employee::count() }}</h2>
                    <p>All Employess in State</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card">
                <div class="card-body">
                    <h5 class="card-title">Total Retired Employees</h5>
                    <h2 class="float-right">10090</h2>
                    <p>All Retired Employees</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection