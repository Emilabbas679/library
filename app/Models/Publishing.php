<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publishing extends Model
{
    protected $table='publishing';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable =[
      'name','address','phone'
    ];
}
