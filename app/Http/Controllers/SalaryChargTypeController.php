<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryChargType;

class SalaryChargTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $chargTypes = SalaryChargType::all();

        return view('pages.salaryChargType.salaryChargTypes-list',compact('chargTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.salaryChargType.salaryChargTypes');

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
      
      'salaryChargType' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargTypes = SalaryChargType::create($values);
        // return back();
       return redirect()->to('salaryChargTypes-list')->with(compact('chargTypes'))->with('message', 'SalaryChargType added successfully');
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
         $chargTypes = SalaryChargType::find($id);
       return view('pages.salaryChargType.editSalaryChargTypes',compact('chargTypes'));
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
      
      'salaryChargType' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargTypes = SalaryChargType::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('salaryChargTypes-list')->with('message', 'SalaryChargType updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $chargTypes = SalaryChargType::find($request->id);
        if ($chargTypes->delete()) {
            return redirect()->to('salaryChargTypes-list')->with('message','SalaryChargType deleted successfully');
        }
    }
}
