<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    // protected $table = ['lineas'];
    protected $table = 'lineas';

    protected $fillable = ['name', 'description',];

}
