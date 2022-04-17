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
                    <h5 class="card-title">Add Cadre</h5>
                    <form class="needs-validation" method="POST" action="{{ route('cadres.store') }}" novalidate>
                        @csrf()
                        <div class="form-row">
                            <div class="col-lg-12 mb-3">
                                <label for="validationCustom01">Name of Cadre</label>
                                <input type="text" class="form-control" id="cadre_name" name="cadre_name" placeholder="e.g. IAS, IPS" required>
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
                    <h5 class="card-title">All Cadre</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl. No</th>
                                    <th scope="col">Cadre Name</th>
                                    <th scope="col">Cadre Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cadres as $cadre)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $cadre->name }}</td>
                                    <td class="">{{ ucfirst($cadre->status) }}</td>
                                    <td>
                                        <a href="{{ route('cadres.edit', ['id'=>$cadre->id ]) }}"><span class="badge badge-success">Edit</span></a>
                                        <a href="{{ route('cadres.delete', ['id'=>$cadre->id ]) }}"><span class="badge badge-danger">Delete</span></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="4">No Cadres added yet.</th>
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