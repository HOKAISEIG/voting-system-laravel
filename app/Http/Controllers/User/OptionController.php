<?php

namespace App\Http\Controllers\User;

use App\Models\Poll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    //
    public function show (Poll $Poll)
    {
      
        return view('user.show_poll')->with("poll",$Poll);
    }
}
