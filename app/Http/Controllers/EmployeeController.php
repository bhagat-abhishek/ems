<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $employees = Employee::all();
        // return view('admin.employees.index', ['employees'=>$employees, 'i'=>1]);
        return view('admin.employees.index');
    }

    public function getEmployees(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('department', function(Employee $employee) {
                    return $employee->department->name;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/employees/view/'.$row["id"].'" class="edit btn btn-info btn-sm">View</a> <a href="/employees/edit/'.$row["id"].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/employees/delete/'.$row["id"].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::get();
        return view('admin.employees.add', ['departments'=>$department]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->emp_man_id = date('md').'EMP'.$request->dept_id.'SKM'.date('y').rand(0, 9999);
        $employee->department_id = $request->dept_id;
        $employee->name = strtolower($request->emp_name);
        $employee->designation = strtolower($request->emp_design);
        $employee->dateof_birth = $request->emp_dob;
        $employee->current_post_held = strtolower($request->emp_cph);
        $employee->salary = $request->emp_salary;
        $employee->dateof_initial_appointment = $request->emp_doia;
        $employee->dateof_retirement = 10-10-2090;

        if($request->file()) {
            $fileName = time().'_'.$request->emp_pic->getClientOriginalName();
            $filePath = $request->file('emp_pic')->storeAs('uploads', $fileName, 'public');
            // $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $employee->image_url = '/storage/' . $filePath;
        }

        $save = $employee->save();

        if($save) {
            return redirect()->route('employees')->with('success', 'Employeee Added Successfully');
        } else {
            return redirect()->route('employees')->with('failed', 'Employee Adding Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('admin.employees.show', ['employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $del = $employee->delete();

        if($del) {
            return back()->with('success', 'Employee Deleted Successfully');
        } else {
            return back()->with('failed', 'Employee Deleting Failed');
        }
    }
}
