<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Poll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    //
    public function show (Poll $Poll)
    {
        if($Poll->poll_end_date >= Carbon::today()->toDateString()){
        return view('user.show_poll')->with("poll",$Poll);
        }
        else
        {
            return abort(500,'time has already passed');
        }
    }
}
