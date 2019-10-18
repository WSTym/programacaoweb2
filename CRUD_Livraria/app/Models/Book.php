<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'author', 'image', 'description'];

    public $rules = [
        'name'          => 'required|min:3|max:100',
        'author'        => 'required|min:3|max:100',
        'description'   => 'required|min:3|max:1000',
    ];
}
