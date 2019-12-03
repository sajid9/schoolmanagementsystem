<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::all();

        return view('pages.session.sessions-list',compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.session.sessions');
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
      
      's_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $sessions = Session::create($values);
        // return back();
       return redirect()->to('sessions-list')->with(compact('sessions'))->with('message', 'Session added successfully');
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
          $session = Session::find($id);
       return view('pages.session.editSessions',compact('session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        $request->validate([
      
      's_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $sessions = Session::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('sessions-list')->with('message', 'Session updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $session = Session::find($request->id);
        if ($session->delete()) {
            return redirect()->to('sessions-list')->with('message','Session deleted successfully');
        }
    }
}
