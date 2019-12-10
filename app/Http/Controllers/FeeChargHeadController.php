<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeeChargHead;

class FeeChargHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chargHeads = FeeChargHead::all();

        return view('pages.feeChargHead.feeChargHead-list',compact('chargHeads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.feeChargHead.feeChargHead');

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
      
      'feeChargHead' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargHeads = FeeChargHead::create($values);
        // return back();
       return redirect()->to('feeChargHead-list')->with(compact('chargHeads'))->with('message', 'FeeChargHead added successfully');
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
         $chargHeads = FeeChargHead::find($id);
       return view('pages.feeChargHead.editFeeChargHead',compact('chargHeads'));
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
      
      'feeChargHead' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargHeads = FeeChargHead::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('feeChargHead-list')->with('message', 'FeeChargHead updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $chargHeads = FeeChargHead::find($request->id);
        if ($chargHeads->delete()) {
            return redirect()->to('feeChargHead-list')->with('message','FeeChargHead deleted successfully');
        }
    }
}
