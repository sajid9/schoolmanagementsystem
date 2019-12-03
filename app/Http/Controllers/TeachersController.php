<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('pages.teachers-list',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.teachers');
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'qualification' => 'required',
        ]);
        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->address = $request->address;
        $teacher->qualification=$request->qualification;
        $teacher->save();
        return redirect()->to('teachers-list')->with('message','Teacher added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teach = Teacher::find($id);
        return view('pages.editTeacher',compact('teach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
         $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'qualification' => 'required',
        ]);
        $teacher = Teacher::find($request->id);
        $teacher->name = $request->name;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->address = $request->address;
        $teacher->qualification=$request->qualification;
        $teacher->save();
        return redirect()->to('teachers-list')->with('message','Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher ,Request $request)
    {
        $teacher = Teacher::find($request->id);
        if ($teacher->delete()) {
            return redirect()->to('teachers-list')->with('message','Teacher deleted successfully');
        }
    }
}
