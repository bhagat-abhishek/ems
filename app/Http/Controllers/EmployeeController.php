<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $employees = Employee::all();
        return view('admin.employees.index', ['employees'=>$employees, 'i'=>1]);
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
        $employee->empid = date('md').'EMP'.substr($request->dept_id, 0, 6).'SKM'.date('y');
        $employee->emp_name = $request->emp_name;
        $employee->deptid = $request->dept_id;
        $employee->emp_designation = $request->emp_design;
        $employee->emp_current_post = $request->emp_cph;
        $employee->emp_cadre = $request->emp_cadre;
        $employee->emp_salary = $request->emp_salary;
        $employee->emp_do_initial_appoinmnet = $request->emp_doia;
        $employee->emp_dob = $request->emp_dob;
        $employee->emp_dor = 10-10-2090;

        if($request->file()) {
            $fileName = time().'_'.$request->emp_pic->getClientOriginalName();
            $filePath = $request->file('emp_pic')->storeAs('uploads', $fileName, 'public');
            // $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $employee->emp_pic_url = '/storage/' . $filePath;
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
        //
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
