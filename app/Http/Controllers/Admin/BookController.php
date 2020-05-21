<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Book;
use App\Models\Book_Authors;
use App\Models\BookCategory;
use App\Models\Category;
use App\Models\Publishing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Spatie\Image\Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers = Publishing::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.books.create',compact('publishers','authors', 'categories'));
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
           'publisher' => 'required',
           'page' => 'required',
           'publish_date' => 'required',
            'description'=>'required',
            'authors' => 'required'
        ]);

        $book = new Book();
        $book->is_active = $request->get('status');


        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('upload/books',$image_name);
            $book->img = $image_name;
        }
        else{
            $book->img = '';
        }

        $book->name = $request->name;
        $book->publisher = $request->publisher;
        $book->publish_date = $request->publish_date;
        $book->description = $request->description;
        $book->pages = $request->page;

        if ($book->save()){

            if ($request->get('authors')){
                $this->bookAuthorCreate($request->get('authors'), $book->id);
            }

            if ($request->get('categories')){
                $this->bookCategoryCreate($request->get('categories'), $book->id);
            }

            return redirect()->route('book.index')->with('success','Kitab müvəffəqiyyətlə əlavə edildi.');
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
    public function show(Book $book)
    {
        return view('admin.books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $publishers = Publishing::all();
        $authors = Author::all();
        $categories = Category::all();
        $selected_authors = $this->author_ids($book->id);
        $selected_cats = $this->category_ids($book->id);
        return view('admin.books.edit',compact('book', 'publishers','authors','categories','selected_authors','selected_cats'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request,[
            'name' => 'required',
            'publisher' => 'required',
            'page' => 'required',
            'publish_date' => 'required',
            'description'=>'required',
            'authors' => 'required',
        ]);

        $book->is_active = $request->get('status');
        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('upload/books',$image_name);

            if(File::exists('upload/books/'.$book->img)){
                File::delete('upload/books/'.$book->img);
            }
            $book->img = $image_name;
        }

        $book->name = $request->name;
        $book->publisher = $request->publisher;
        $book->publish_date = $request->publish_date;
        $book->description = $request->description;
        $book->pages = $request->page;
        if ($request->get('authors')){
            $this->bookAuthorUpdate($request->get('authors'), $book->id);
        }

        if ($request->get('categories')){
            $this->bookCategoryUpdate($request->get('categories'), $book->id);
        }
        if ($book->save()){
            return redirect()->route('book.index')->with('success','Kitab müvəffəqiyyətlə yeniləndi.');
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
    public function destroy(Book $book)
    {
        if(File::exists('upload/books/'.$book->img)){
            File::delete('upload/books/'.$book->img);
        }
        $book->delete();
        return redirect()->route('book.index')->with('success','Müvəffəqiyyətlə silindi' );
    }




    public function bookAuthorCreate($authors, $book_id)
    {
        if (is_array($authors)){
            foreach ($authors as $a) {
                $rel = new Book_Authors();
                $rel->book_id = $book_id;
                $rel->author_id = $a;
                $rel->save();
            }
            return true;
        }
    }


    public function author_ids($book_id)
    {
        $rels = Book_Authors::where('book_id', $book_id)->get();
        $author_ids = [];
        foreach ($rels as $rel){
            $author_ids[] = $rel->author_id;
        }
        return $author_ids;
    }


    public function bookAuthorUpdate($authors, $book_id)
    {
        $author_ids = $this->author_ids($book_id);
        if($authors !== $author_ids) {
            Book_Authors::where('book_id', $book_id)->delete();
            return $this->bookAuthorCreate($authors, $book_id);
        }
    }


    public function bookCategoryCreate($categories, $book_id)
    {
        if (is_array($categories)){
            foreach ($categories as $a) {
                $rel = new BookCategory();
                $rel->book_id = $book_id;
                $rel->category_id = $a;
                $rel->save();
            }
            return true;
        }
    }


    public function category_ids($book_id)
    {
        $rels = BookCategory::where('book_id', $book_id)->get();
        $category_ids = [];
        foreach ($rels as $rel){
            $category_ids[] = $rel->category_id;
        }
        return $category_ids;
    }


    public function bookCategoryUpdate($categories, $book_id)
    {
        $category_ids = $this->category_ids($book_id);
        if($categories !== $category_ids) {
            BookCategory::where('book_id', $book_id)->delete();
            return $this->bookCategoryCreate($categories, $book_id);
        }
    }
}
