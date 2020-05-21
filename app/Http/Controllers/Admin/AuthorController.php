<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return  view('admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
           'birthday' => 'required',
           'description' => 'required',

        ]);
        $author = new Author();
        $author->is_active = $request->get('status');
        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('upload/authors',$image_name);
            $author->img = $image_name;
        }

        else{
            $author->img = '';
        }

        $author->name = $request->name;
        $author->surname = $request->surname;
        $author->hometown = $request->hometown;
        $author->parent_name = $request->parent_name;
        $author->birthday = $request->birthday;
        $author->deathday = $request->deathday;
        $author->description = $request->description;

        if ($author->save()){
            return redirect()->route('author.index')->with('success','Müəllif müvəffəqiyyətlə əlavə edildi.');
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
    public function show(Author $author)
    {
        return view('admin.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin.author.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request,[
            'name' => 'required',
            'surname' => 'required',
            'birthday' => 'required',
            'description' => 'required',

        ]);


        $author->is_active = $request->get('status');

        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('upload/authors',$image_name);

            if(File::exists('upload/authors/'.$author->img)){
                File::delete('upload/authors/'.$author->img);
            }
            $author->img = $image_name;
        }


        $author->name = $request->name;
        $author->surname = $request->surname;
        $author->hometown = $request->hometown;
        $author->parent_name = $request->parent_name;
        $author->birthday = $request->birthday;
        $author->deathday = $request->deathday;
        $author->description = $request->description;


        if ($author->save()){
            return redirect()->route('author.index')->with('success','Müəllif müvəffəqiyyətlə yeniləndi.');
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
    public function destroy(Author $author)
    {
        if(File::exists('upload/authors/'.$author->img)){
            File::delete('upload/authors/'.$author->img);
        }
        $author->delete();
        return redirect()->route('author.index')->with('success','Müvəffəqiyyətlə silindi' );

    }
}
