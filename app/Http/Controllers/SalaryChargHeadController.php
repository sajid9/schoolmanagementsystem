<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryChargHead;

class SalaryChargHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
    {
        $chargHeads = SalaryChargHead::all();

        return view('pages.salaryChargHead.salaryChargHead-list',compact('chargHeads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.salaryChargHead.salaryChargHead');

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
      
      'salaryChargHead' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargHeads = SalaryChargHead::create($values);
        // return back();
       return redirect()->to('salaryChargHead-list')->with(compact('chargHeads'))->with('message', 'SalaryChargHead added successfully');
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
         $chargHeads = SalaryChargHead::find($id);
       return view('pages.salaryChargHead.editSalaryChargHead',compact('chargHeads'));
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
      
      'salaryChargHead' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $chargHeads = SalaryChargHead::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('salaryChargHead-list')->with('message', 'SalaryChargHead updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $chargHeads = SalaryChargHead::find($request->id);
        if ($chargHeads->delete()) {
            return redirect()->to('salaryChargHead-list')->with('message','SalaryChargHead deleted successfully');
        }
    }
}
