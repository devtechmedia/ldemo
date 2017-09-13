<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Book extends Eloquent{

    //protected $collection = 'books';
    protected $fillable = [];
    //protected $collection = 'books';
    //protected $connection = 'mysql';
    public $table='books';

}
