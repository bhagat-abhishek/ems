@extends('layouts.master')

@section('body-contents')
<div class="container">
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Designation</h5>
                    <form class="needs-validation" method="post" action="{{ route('designation.update', ['id'=>$designations->id]) }}" novalidate> @csrf()
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="dept_name">Name of Designation</label>
                                <input type="text" class="form-control" id="designation_name" name="designation_name" placeholder="e.g. Chief Incharge" value="{{ $designations->name }}" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                            <select id="designation_status" name="designation_status" class="form-control custom-select">
                                    <option selected value="{{ $designations->status }}">{{ ucfirst($designations->status) }}</option>
                                    <option value="active">Active</option>
                                    <option value="deactive">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('designation') }}" class="btn btn-secondary" type="submit">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection