<?php

namespace App\Http\Controllers;

use App\Models\Cadre;
use Illuminate\Http\Request;

class CadreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cadres = Cadre::get();
        return view('admin.cadre.index', ['cadres'=>$cadres, 'i'=>1]);
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
        $cadre = new Cadre();
        $cadre->name = $request->cadre_name;
        $save = $cadre->save();

        if($save) {
            return back()->with('success', 'Cadre Added Successfully');
        } else {
            return back()->with('failed', 'Cadre Adding Failed');
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
        $cadres = Cadre::find($id);
        return view('admin.cadre.edit', ['cadres'=>$cadres]);
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
        $cadres = Cadre::find($id);
        $cadres->name = $request->cadre_name;
        $cadres->status = $request->cadre_status;
        $upd = $cadres->update();
        if($upd) {
            return redirect()->route('cadres')->with('success', 'Cadre updated Successfully');
        } else {
            return redirect()->route('cadres')->with('failed', 'Cadre Updating Failed');
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
        $cadre = Cadre::find($id);
        $del = $cadre->delete();

        if($del) {
            return back()->with('success', 'Cadre Deleted Successfully');
        } else {
            return back()->with('failed', 'Cadre Deleting Failed');
        }
    }
}
