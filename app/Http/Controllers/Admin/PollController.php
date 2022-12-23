<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Poll;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    //
    public function store (Request $request) 
    {
       
        
        $poll = new Poll([
            'user_id'=>Auth::user()->id,
            
            'poll_end_date'=>$request->poll_end_date,
            'poll_body'=>$request->poll_body

        ]);
        $poll->save();
        
        return view('admin.add_option')->with('poll',$poll);
    }
   
    public function create()
    {
        return view('admin.add_poll');
    }
    public function show()
    {
        $polls=Poll::whereDate('poll_end_date', '>=', Carbon::today()->toDateString())->latest()->get();
        return view('admin.index')->with('polls',$polls);
    }
    public function viewStats(Poll $poll)
    {
        $options = $poll->options;
        $votedUsers = $poll->votedUsers;
       
        $var = array();
        $label = array();
        foreach($options as $option)
        {
            $count = 0;
            $id = $option->id;
            foreach($votedUsers as $vote)
            {
                if($id == $vote->pivot->option_id) {
                    $count ++;
                };
            }
            $label[] = $option->option_body;
            $var[] = $count;
        }
       
       
        return view('admin.chart')->with('var',$var)->with('label',$label)->with('totalVotes',$votedUsers->count());
    }
}
