<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Poll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PollController extends Controller
{
    //
    public function show()
    {
        $polls=Poll::whereDate('poll_end_date', '>=', Carbon::today()->toDateString())->latest()->get();
    
        return view("user.index")->with('polls',$polls);
    }
   
}
