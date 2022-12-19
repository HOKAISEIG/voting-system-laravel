<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','option_id'
    ]
}
