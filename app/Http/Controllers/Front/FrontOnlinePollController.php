<?php

namespace App\Http\Controllers\Front;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\OnlinePoll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontOnlinePollController extends Controller
{
    public function poll_previous(){
        Helpers::read_json();
        $poll_results = OnlinePoll::where('language_id', CURRENT_LANG_ID)->orderBy('id','desc')->paginate(10);
        return view('front.poll_results', compact('poll_results'));
    }
    public function poll_submit(Request $request){
        $request->validate([
            'vote_question' => 'required',
        ]);
        $validator = Validator::make($request->all(), [
            'vote_question' => 'required',
        ]);
        if($validator->fails()){
            return response()->json( ['code'=> 0, 'error_message' => $validator->errors()->toArray()] );
        }else{
            if($request->poll_id){
                $vote_question_yes = $request->vote_question == 'yes' ? 1 : 0;
                $vote_question_no = $request->vote_question == 'no' ? 1 : 0;
                $poll = OnlinePoll::find($request->poll_id);
                if(!$poll) return response()->json( ['code'=> 2, 'warning_message' => 'Data Not Found', ] );
                $poll->yes_vote = $poll->yes_vote+$vote_question_yes;
                $poll->no_vote = $poll->no_vote+$vote_question_no;
                $poll->update();

                session()->put('current_poll_id', $poll->id);

                $total_vote = $poll->yes_vote+$poll->no_vote;
                $total_yes_percentage = 0;
                if($poll->yes_vote > 0){
                    $total_yes_percentage = ($poll->yes_vote*100)/$total_vote;
                    $total_yes_percentage = ceil($total_yes_percentage);
                }
                $total_no_percentage = 0;
                if($poll->no_vote > 0){
                    $total_no_percentage = ($poll->no_vote*100)/$total_vote;
                    $total_no_percentage = ceil($total_no_percentage);
                }

                $data_vote = ['yes' => $poll->yes_vote, 'yes_percen' => $total_yes_percentage, 'no' => $poll->no_vote, 'no_percen' => $total_no_percentage];
                return response()->json( ['code'=> 1, 'success_message' => 'Your vote is counted successfully', 'data' => $data_vote] );
            }else{
                return response()->json( ['code'=> 2, 'warning_message' => 'Data Not Found'] );
            }
        }
    }
}
