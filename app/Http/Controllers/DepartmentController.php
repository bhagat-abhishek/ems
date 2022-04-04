<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::get();
        return view('admin.departments.index', ['departments'=>$departments, 'i'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = new Department();
        $department->dept_id = date('d').substr($request->dept_name, 0, 2).date('m');
        $department->dept_name = $request->dept_name;
        $save = $department->save();

        if($save) {
            return back()->with('success', 'Department Added Successfully');
        } else {
            return back()->with('failed', 'Department Adding Failed');
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
        $departments = Department::find($id);
        return view('admin.departments.edit', ['departments'=>$departments]);
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
        $departments = Department::find($id);
        $departments->dept_name = $request->dept_name;
        $upd = $departments->update();
        if($upd) {
            return redirect()->route('departments')->with('success', 'Department updated Successfully');
        } else {
            return redirect()->route('departments')->with('failed', 'Department Updating Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $del = $department->delete();

        if($del) {
            return back()->with('success', 'Department Deleted Successfully');
        } else {
            return back()->with('failed', 'Department Deleting Failed');
        }
    }
}
