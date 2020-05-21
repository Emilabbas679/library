<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_Authors extends Model
{
    protected $table='books_authors';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable =['book_id','author_id'];


    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function author()
    {
        return $this->hasOne(Author::class, 'id', 'author_id');
    }
}
