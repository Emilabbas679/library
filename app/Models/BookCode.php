<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCode extends Model
{
    protected $table='book_codes';
    public $timestamps = true;
    protected $primaryKey= 'id';
    protected $fillable =[
        'book_id','code', 'status'
    ];

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

}

