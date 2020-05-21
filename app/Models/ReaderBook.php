<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ReaderBook extends Model
{
    protected $table='reader_books';
    public $timestamps = true;
    protected $primaryKey= 'id';
    protected $fillable =[
        'book_id','book_code_id', 'status', 'given_date', 'taken_date','reader_id', 'user_id'
    ];

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }
    public function bookcode()
    {
        return $this->hasOne(BookCode::class, 'id', 'book_code_id');
    }
    public function reader()
    {
        return $this->hasOne(Reader::class, 'id', 'reader_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
