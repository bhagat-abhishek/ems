@extends('layouts.master')

@section('body-contents')
<div class="container">
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Department</h5>
                    <form class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Name of Department</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="e.g. Education, Health" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('departments') }}" class="btn btn-secondary" type="submit">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection