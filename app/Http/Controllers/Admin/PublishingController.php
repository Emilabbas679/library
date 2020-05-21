<?php

namespace App\Http\Controllers\Admin;

use App\Models\Publishing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publishing::all();
        return view('admin.publishing.index',compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publishing.create');
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
            'address' => 'required',
            'phone' => 'required',
        ]);
        if (Publishing::create($request->all())){
            return redirect()->route('publishing.index')->with('success','Nəşriyyat müvəffəqiyyətlə əlavə edildi.');
        }
        else{
            return redirect()->back()->withInput()->with('error', 'Xəta baş verdi, zəhmət olmazsa yenidən yoxlayın');
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
    public function edit(Publishing $publishing)
    {
        return view('admin.publishing.edit', compact('publishing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publishing $publishing)
    {
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        if ($publishing->update($request->all())){
            return redirect()->route('publishing.index')->with('success','Nəşriyyat müvəffəqiyyətlə yeniləndi.');
        }
        else{
            return redirect()->back()->withInput()->with('error', 'Xəta baş verdi, zəhmət olmazsa yenidən yoxlayın');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publishing $publishing)
    {
        if($publishing->delete()){
            return redirect()->route('publishing.index')->with('success','Müvəffəqiyyətlə silindi' );
        }
        else{
            return redirect()->back()->with('error', 'Xəta baş verdi, zəhmət olmazsa yenidən yoxlayın');
        }
    }
}
