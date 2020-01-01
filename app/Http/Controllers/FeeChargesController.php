<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeeChargCategory;
use App\FeeChargHead;
use App\MClass;
use App\FeeCharge;

class FeeChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $feeCharges = FeeCharge::with('chargCategories','chargHeads','classes')->get();

          //dd($feeCharges);
        return view('pages.feeCharge.feeCharges-list',compact('feeCharges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $chargCategories = FeeChargCategory::all();
        $chargHeads = FeeChargHead::all();
        $classes = MClass::all();
         return view('pages.feeCharge.feeCharges',compact('chargHeads','chargCategories','classes'));
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
  
      
      'chargCategory_id' => 'required',
      'chargHead_id' => 'required',
      'class_id' => 'required',
      'feeAmount' => 'required',
      'transactionType' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $feeCharges = FeeCharge::create($values);
        // return back();
       return redirect()->to('feeCharges-list')->with(compact('feeCharges'))->with('message', 'FeeCharge added successfully');
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
        
        $chargCategories = FeeChargCategory::all();
        $chargHeads = FeeChargHead::all();
        $classes = MClass::all();
        $feeCharges = FeeCharge::find($id);
        return view('pages.feeCharge.editFeeCharges ',compact('chargCategories','feeCharges','chargHeads','classes'));
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
      
      
      'chargCategory_id' => 'required',
      'chargHead_id' => 'required',
      'class_id' => 'required',
      'feeAmount' => 'required',
      'transactionType' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $feeCharges = FeeCharge::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('feeCharges-list')->with('message', 'FeeCharge updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $feeCharges = FeeCharge::find($request->id);
        if($feeCharges->delete()) {
            return redirect()->to('feeCharges-list')->with('message','FeeCharge deleted successfully');
        }
    }
}
