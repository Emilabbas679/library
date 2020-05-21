<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libs = User::all();
        return view('admin.lib.index', compact('libs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lib.create');
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
            'password' => 'required',
        ]);
        $user = User::where('email', $request->get('email'))->first();
        if($user){
            return redirect()->back()->withInput()->with('error', 'E-mail artıq istifadə edilib.');
        }
        else{
            $user = new User();
            $user->name = $request->get('name');
            $user->surname = $request->get('surname');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->status = 2;
            $user->save();
            return redirect()->route('lib.index')->with('success', 'İşçi qeydiyyata alındı.');
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
        $lib = User::find($id);
        return view('admin.lib.edit', compact('lib'));
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
        ]);
        $user = User::where('email', $request->get('email'))->get();
        if($user && count($user)>1){
            return redirect()->back()->withInput()->with('error', 'E-mail artıq istifadə edilib.');
        }
        else{
            $user = User::find($id);
            $user->name = $request->get('name');
            $user->surname = $request->get('surname');
            $user->email = $request->get('email');
            $user->save();
            return redirect()->route('lib.index')->with('success', 'İşçi qeydiyyata alındı.');
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
        $user = User::find($id);
        $user->delete();
        return redirect()->route('lib.index')->with('success', 'Müvəffəqiyyətlə silindi.');

    }
}
