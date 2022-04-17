<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employess = Employee::where('status', 'pending')->get();
        return view('admin.moderator.index', ['employees'=>$employess, 'i'=>1]);
    }

    public function approve($id)
    {
        $employee = Employee::find($id);
        $employee->status = 'active';
        $upd = $employee->update();

        if($upd) {
            return redirect()->route('mod.employees')->with('success', 'Employeee Approved Successfully');
        } else {
            return redirect()->route('mod.employees')->with('failed', 'Employee Approving Failed');
        }
    }

    public function reject($id)
    {
        $employee = Employee::find($id);
        $employee->status = 'rejected';
        $upd = $employee->update();

        if($upd) {
            return redirect()->route('mod.employees')->with('success', 'Employeee Rejected Successfully');
        } else {
            return redirect()->route('mod.employees')->with('failed', 'Employee Rejected Failed');
        }
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
        //
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
        //
    }
}
