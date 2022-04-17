<?php

namespace App\Http\Controllers;

use App\Models\Cadre;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DataEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::get();
        $cadre = Cadre::get();
        $designation = Designation::get();
        return view('admin.entry.emp.add', [
            'departments'=>$department, 
            'cadres'=>$cadre, 
            'designations'=>$designation
        ]);
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
        $employee->emp_unique_id = date('Y').'-'.Str::random(3).'-'.date('m').rand(0, 99999);
        $employee->department_id = $request->dept_id;
        $employee->name = strtolower($request->emp_name);
        $employee->designation_id = $request->emp_design;
        $employee->cadre_id = $request->emp_cadre;
        $employee->posting_place = strtolower($request->emp_pp);
        $employee->dateof_birth = $request->emp_dob;

        $employee->dateof_initial_appointment = $request->emp_doia;
        $employee->dateof_promotion = $request->emp_dop;
        $employee->dateof_retirement = $this->dateof_retirement($request->emp_dob);

        $employee->status = 'pending';

        if($request->file()) {
            $fileName = time().'_'.$request->emp_pic->getClientOriginalName();
            $filePath = $request->file('emp_pic')->storeAs('uploads', $fileName, 'public');
            // $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $employee->image_url = '/storage/' . $filePath;
        }

        $save = $employee->save();

        if($save) {
            return redirect()->route('data-entry')->with('success', 'Employeee Added Successfully');
        } else {
            return redirect()->route('data-entry')->with('failed', 'Employee Adding Failed');
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
        $employee = Employee::find($id);
        $department = Department::get();
        $cadre = Cadre::get();
        $designation = Designation::get();
        return view('admin.entry.emp.edit', [
            'employee'=>$employee,
            'departments'=>$department, 
            'cadres'=>$cadre, 
            'designations'=>$designation
        ]);
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
        $employee = Employee::find($id);
        $employee->department_id = $request->dept_id;
        $employee->name = strtolower($request->emp_name);
        $employee->designation_id = $request->emp_design;
        $employee->cadre_id = $request->emp_cadre;
        $employee->posting_place = strtolower($request->emp_pp);
        $employee->dateof_birth = $request->emp_dob;

        $employee->dateof_initial_appointment = $request->emp_doia;
        $employee->dateof_promotion = $request->emp_dop;
        $employee->dateof_retirement = $this->dateof_retirement($request->emp_dob);

        $employee->status = 'pending';

        if($request->emp_pic != '') {
            if($request->file()) {
                $fileName = time().'_'.$request->emp_pic->getClientOriginalName();
                $filePath = $request->file('emp_pic')->storeAs('uploads', $fileName, 'public');
                // $fileModel->name = time().'_'.$request->file->getClientOriginalName();
                $employee->image_url = '/storage/' . $filePath;
            }
        }

        $save = $employee->update();

        if($save) {
            return redirect()->route('data-entry')->with('success', 'Employeee Updated Successfully');
        } else {
            return redirect()->route('data-entry')->with('failed', 'Employee Updating Failed');
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
        //
    }

    public function dateof_retirement($data) {
        $newDate = Carbon::createFromFormat('Y-m-d', $data)->addYear(58)->toDateString();
        return $newDate;
     }
}
