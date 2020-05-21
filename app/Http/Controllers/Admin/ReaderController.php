<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reader;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $readers = Reader::all();
        return view('admin.reader.index', compact('readers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $user = Reader::where('email', $request->get('email'))->first();
        if($user){
            return redirect()->back()->withInput()->with('error', 'E-mail artıq istifadə edilib.');
        }
        else{
            $user = new Reader();
            $user->name = $request->get('name');
            $user->surname = $request->get('surname');
            $user->email = $request->get('email');
            $user->phone = $request->get('phone');
            $user->save();
            return redirect()->route('reader.index')->with('success', 'Oxucu qeydiyyata alındı.');
        }
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
        $reader = Reader::find($id);
        return view('admin.reader.edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $user = Reader::where('email', $request->get('email'))->get();
        if($user && count($user)>1){
            return redirect()->back()->withInput()->with('error', 'E-mail artıq istifadə edilib.');
        }
        else{
            $user = Reader::find($id);
            $user->name = $request->get('name');
            $user->surname = $request->get('surname');
            $user->email = $request->get('email');
            $user->phone = $request->get('phone');
            $user->save();
            return redirect()->route('reader.index')->with('success', 'Oxucu qeydiyyata alındı.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Reader::find($id);
        $user->delete();
        return redirect()->route('reader.index')->with('success', 'Müvəffəqiyyətlə silindi.');

    }
}
