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
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Department</h5>
                    <form class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Name of Department</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="e.g. Education, Health" required>
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
                    <h5 class="card-title">All Departmentd</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl. No</th>
                                    <th scope="col">Dept ID</th>
                                    <th scope="col">Dept Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>0776</td>
                                    <td>Sale Management</td>
                                    <td>
                                        <span class="badge badge-success">Edit</span>
                                        <span class="badge badge-danger">Delete</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>0759</td>
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