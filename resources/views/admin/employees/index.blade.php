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
        <div class="col-lg-12 mb-4">
        <a href="{{ route('employees.add') }}" class="btn btn-success">Add Employee</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Employees</h5>
                    <div class="table-responsive">
                        <table class="table table-hover yajra-datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Sl._No</th>
                                    <th scope="col">Employee ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Date_Of_Birth</th>
                                    <th scope="col">Current_Post_Held</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Date_Of_Initial_Appointment</th>
                                    <th scope="col">Date_Of_Retirement</th>
                                    <th scope="col">Employees_Action_</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-contents')
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('employees.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'emp_man_id', name: 'emp_man_id'},
            {data: 'name', name: 'name'},
            {data: 'department', name: 'department'},
            {data: 'designation', name: 'designation'},
            {data: 'dateof_birth', name: 'dateof_birth'},
            {data: 'current_post_held', name: 'current_post_held'},
            {data: 'salary', name: 'salary'},
            {data: 'dateof_initial_appointment', name: 'dateof_initial_appointment'},
            {data: 'dateof_retirement', name: 'dateof_retirement'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true,
            },
        ],
        dom: 'Bfrtlip',
        buttons: [
            'excel',
        ],
    });
    
  });
</script>
@endsection