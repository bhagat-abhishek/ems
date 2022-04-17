<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::get();
        return view('admin.designation.index', ['designations'=>$designations, 'i'=>1]);
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
        $designation = new Designation();
        $designation->name = $request->designation_name;
        $save = $designation->save();

        if($save) {
            return back()->with('success', 'Designation Added Successfully');
        } else {
            return back()->with('failed', 'Designation Adding Failed');
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
        $designations = Designation::find($id);
        return view('admin.designation.edit', ['designations'=>$designations]);
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
        $designations = Designation::find($id);
        $designations->name = $request->designation_name;
        $designations->status = $request->designation_status;
        $upd = $designations->update();
        if($upd) {
            return redirect()->route('designation')->with('success', 'Designation updated Successfully');
        } else {
            return redirect()->route('designation')->with('failed', 'Designation Updating Failed');
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
        $designation = Designation::find($id);
        $del = $designation->delete();

        if($del) {
            return back()->with('success', 'Designation Deleted Successfully');
        } else {
            return back()->with('failed', 'Designation Deleting Failed');
        }
    }
}
