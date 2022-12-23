<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    //
    public function create(Request $request)
    {
        $poll_id = $request->poll_id;
        $option_id = $request->option_id;

        $user = Auth::user();
        $votedPoll = $user->votedPolls()->where(['poll_id'=>$poll_id])->count();
        if($votedPoll == 0){
            $user->votedPolls()->attach($poll_id,['option_id'=>$option_id]);
        }
        else{
            $user->votedPolls()->detach($poll_id);
            $user->votedPolls()->attach($poll_id,['option_id'=>$option_id]);
        }
        return view('user.home')->with('sucess','voted sucessfully');
       
    }

    // many to many relationship between poll and user
}
