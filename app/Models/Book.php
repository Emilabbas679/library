<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='books';
    public $timestamps = true;
    protected $primaryKey= 'id';
    protected $fillable =[
      'name','pages','publisher','publish_date','description'
    ];

    public function publish()
    {
        return $this->belongsTo(Publishing::class, 'publisher','id');
    }

    public function authors()
    {
        return $this->hasMany('App\Models\Book_Authors');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\BookCategory');
    }


    public function codes()
    {
        return $this->hasMany('App\Models\BookCode');

    }

}
