<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codes extends Model
{
    protected $fillable = ['title', 'priority', 'body'];
}
