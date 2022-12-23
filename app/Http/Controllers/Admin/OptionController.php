<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poll;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
     public function store(Request $request)
    {
        
        $option = new Option([
            'poll_id'=> $request->poll_id,
            'option_body'=> $request->option_body,
        ]);
        $option->save();
        $poll =Poll::find($request->poll_id);
        return view('admin.add_option')->with('poll',$poll);
    }
}
