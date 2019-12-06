<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryChargCategory;

class SalaryChargCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $chargCategories = SalaryChargCategory::all();

        return view('pages.salaryChargCategory.salaryChargCategory-list',compact('chargCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.salaryChargCategory.salaryChargCategory');

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
      
      'salaryChargCategory' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargCategories = SalaryChargCategory::create($values);
        // return back();
       return redirect()->to('salaryChargCategory-list')->with(compact('chargCategories'))->with('message', 'SalaryChargCategory added successfully');
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
         $chargCategories = SalaryChargCategory::find($id);
       return view('pages.salaryChargCategory.editSalaryChargCategory',compact('chargCategories'));
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
      
      'salaryChargCategory' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargCategories = SalaryChargCategory::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('salaryChargCategory-list')->with('message', 'SalaryChargCategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $chargCategories = SalaryChargCategory::find($request->id);
        if ($chargCategories->delete()) {
            return redirect()->to('salaryChargCategory-list')->with('message','SalaryChargCategory deleted successfully');
        }
    }
}
