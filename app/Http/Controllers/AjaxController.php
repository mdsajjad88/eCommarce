<?php

namespace App\Http\Controllers;

use App\Models\Ajax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    /**
     * Show the form for creating a new resource.
     */
    public function adddata(Request $request)
    {     
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'gender'=>'required',
            'degree'=>'required',
            'photo'=>'required',

        ]); 
        $file = $request->file('photo');
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('images', $filename, 'public');

       $ajax = new Ajax();
       $ajax->name = $request->name;
       $ajax->email  = $request->email ;
       $ajax->gender  = $request->gender ;
       $ajax->degree = $request->degree;
       $ajax->photo = $path;
       $ajax->save();
       $data = Ajax::get();
        Session::flash('success', 'New Account Created');
        return response()->json(['result'=>'New Account Created', 'data'=>$data]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('ajax');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ajax $ajax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ajax $ajax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ajax $ajax)
    {
        //
    }
}
