<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeeChargType;

class FeeChargTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chargTypes = FeeChargType::all();

        return view('pages.feeChargType.feeChargTypes-list',compact('chargTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.feeChargType.feeChargTypes');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
      
      'feeChargType' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargTypes = FeeChargType::create($values);
        // return back();
       return redirect()->to('feeChargTypes-list')->with(compact('chargTypes'))->with('message', 'FeeChargType added successfully');
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
         $chargTypes = FeeChargType::find($id);
       return view('pages.feeChargType.editFeeChargTypes',compact('chargTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $request->validate([
      
      'feeChargType' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargTypes = FeeChargType::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('feeChargTypes-list')->with('message', 'FeeChargType updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $chargTypes = FeeChargType::find($request->id);
        if ($chargTypes->delete()) {
            return redirect()->to('feeChargTypes-list')->with('message','FeeChargType deleted successfully');
        }
    }
}
