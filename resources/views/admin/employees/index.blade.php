@extends('layouts.master')

@section('body-contents')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning m-b-lg" role="alert">
                Data has been updated 23 min ago.
            </div>
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
                                    <th scope="col">DO Initial Appoinment</th>
                                    <th scope="col">DO Birth</th>
                                    <th scope="col">DO Retirement</th>
                                    <th scope="col">Pic</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>0776</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>
                                        <span class="badge badge-success">Edit</span>
                                        <span class="badge badge-danger">Delete</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>0759</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Sale Management</td>
                                    <td>Dropbox</td>
                                    <td>Dropbox</td>
                                    <td>
                                        <span class="badge badge-success">Edit</span>
                                        <span class="badge badge-danger">Delete</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection