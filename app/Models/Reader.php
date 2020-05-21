<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    protected $table='readers';
    protected $fillable = [
        'name', 'email', 'surname','phone'
    ];
}
