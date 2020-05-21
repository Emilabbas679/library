<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\BookCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = BookCode::all();
        return view('admin.b-code.index', compact('codes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view('admin.b-code.create', compact('books'));
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
            'book' => 'required',
            'code' => 'required',
        ]);

        $book = new BookCode();
        $book->book_id = $request->get('book');
        $book->code = $request->get('code');
        $book->status = $request->get('status');
        $book->save();
        return redirect()->route('book-code.index')->with('success', 'Müvəffəqiyyətlə əlavə edildi');
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
        $code = BookCode::find($id);
        $books = Book::all();
        return view('admin.b-code.edit', compact('code', 'books'));
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
            'book' => 'required',
            'code' => 'required',
        ]);

        $book = BookCode::find($id);
        $book->book_id = $request->get('book');
        $book->code = $request->get('code');
        $book->status = $request->get('status');
        $book->save();
        return redirect()->route('book-code.index')->with('success', 'Müvəffəqiyyətlə yeniləndi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $code = BookCode::find($id);
        $code->delete();
        return redirect()->route('book-code.index')->with('success', 'Müvəffəqiyyətlə silindi');

    }
}
