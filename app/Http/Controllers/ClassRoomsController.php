<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassRoom;


class ClassRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classRooms = ClassRoom::all();

        return view('pages.classRoom.classRooms-list',compact('classRooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.classRoom.classRooms');

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
      
      'cRoom_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $classRooms = ClassRoom::create($values);
        // return back();
       return redirect()->to('classRooms-list')->with(compact('classRooms'))->with('message', 'ClassRoom added successfully');
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
         $classRoom = ClassRoom::find($id);
       return view('pages.classRoom.editClassRoom',compact('classRoom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassRoom $classRoom)
    {
         $request->validate([
      
      'cRoom_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $classRooms = ClassRoom::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('classRooms-list')->with('message', 'ClassRoom updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $classRoom = ClassRoom::find($request->id);
        if ($classRoom->delete()) {
            return redirect()->to('classRooms-list')->with('message','ClassRoom deleted successfully');
        }
    }
}
