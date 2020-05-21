<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        return view('admin.category.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');

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
        ]);
        if (Category::create($request->all())){
            return redirect()->route('category.index')->with('success','Kateqoriya müvəffəqiyyətlə əlavə edildi.');
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
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        if ($category->update($request->all())){
            return redirect()->route('category.index')->with('success','Kateqoriya müvəffəqiyyətlə yeniləndi.');
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
    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect()->route('category.index')->with('success','Müvəffəqiyyətlə silindi' );
        }
        else{
            return redirect()->back()->with('error', 'Xəta baş verdi, zəhmət olmazsa yenidən yoxlayın');
        }
    }
}
