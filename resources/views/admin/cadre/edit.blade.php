@extends('layouts.master')

@section('body-contents')
<div class="container">
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Cadre</h5>
                    <form class="needs-validation" method="post" action="{{ route('cadres.update', ['id'=>$cadres->id]) }}" novalidate> @csrf()
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="dept_name">Name of Cadre</label>
                                <input type="text" class="form-control" id="cadre_name" name="cadre_name" placeholder="e.g. IAS, IPS" value="{{ $cadres->name }}" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                            <select id="cadre_status" name="cadre_status" class="form-control custom-select">
                                    <option selected value="{{ $cadres->status }}">{{ ucfirst($cadres->status) }}</option>
                                    <option value="active">Active</option>
                                    <option value="deactive">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('cadres') }}" class="btn btn-secondary" type="submit">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection