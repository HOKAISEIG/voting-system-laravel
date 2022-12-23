<?php

namespace App\Http\Controllers\User;

use App\Models\Poll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PollController extends Controller
{
    //
    public function show()
    {
        $polls= Poll::latest()->get();
        return view("user.index")->with('polls',$polls);
    }
   
}
