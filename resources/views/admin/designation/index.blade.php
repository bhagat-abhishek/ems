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
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Designation</h5>
                    <form class="needs-validation" method="POST" action="{{ route('designation.store') }}" novalidate>
                        @csrf()
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Name of Designation</label>
                                <input type="text" class="form-control" id="designation_name" name="designation_name" placeholder="e.g. Incharge, etc" required>
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
                    <h5 class="card-title">All Departments</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl. No</th>
                                    <th scope="col">Designation Name</th>
                                    <th scope="col">Designation Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($designations as $designation)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $designation->name }}</td>
                                    <td class="">{{ ucfirst($designation->status) }}</td>
                                    <td>
                                        <a href="{{ route('designation.edit', ['id'=>$designation->id ]) }}"><span class="badge badge-success">Edit</span></a>
                                        <a href="{{ route('designation.delete', ['id'=>$designation->id ]) }}"><span class="badge badge-danger">Delete</span></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="4">No Designation added yet.</th>
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