<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $table='book_categories';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable =['book_id','category_id'];


    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
