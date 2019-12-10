<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeeChargCategory;

class FeeChargCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $chargCategories = FeeChargCategory::all();

        return view('pages.feeChargCategory.feeChargCategory-list',compact('chargCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.feeChargCategory.feeChargCategory');

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
      
      'feeChargCategory' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargCategories = FeeChargCategory::create($values);
        // return back();
       return redirect()->to('feeChargCategory-list')->with(compact('chargCategories'))->with('message', 'FeeChargCategory added successfully');
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
         $chargCategories = FeeChargCategory::find($id);
       return view('pages.feeChargCategory.editFeeChargCategory',compact('chargCategories'));
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
      
      'feeChargCategory' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargCategories = FeeChargCategory::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('feeChargCategory-list')->with('message', 'FeeChargCategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $chargCategories = FeeChargCategory::find($request->id);
        if ($chargCategories->delete()) {
            return redirect()->to('feeChargCategory-list')->with('message','FeeChargCategory deleted successfully');
        }
    }
}
