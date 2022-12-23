<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $fillable = [
        'poll_body','user_id','poll_end_date'
    ];
    public function options()
    {
    
        return $this->hasMany(Option::class);
    }
    public function votedUsers(){
        return $this->belongsToMany(User::class,'poll_users', 'poll_id', 'user_id')->withPivot('option_id');
    }
}
