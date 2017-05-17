<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Scholar;
use App\User;
use App\Sponsor;
use App\Message;
use Carbon\Carbon;
class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id');
        $student = Scholar::findOrFail($stud_id)->first();
        $inbox = Message::where('msg_receiver','=',$user_id)->get();
        // $senders = Student::
        return view('/user/messages', compact('student','user','inbox'));
    }

    public function getReadMsg(){
        $user_id = Auth::user()->user_id;
        $read = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','read')->get();
        $messages = array();
        foreach($read as $message){
            // reminder to self: will fix in the future for now muna lng muna
            $user = User::find($message->msg_sender);
            if($user->user_type=='sponsor'){
                $sender = Sponsor::find($user->user_id);
                $sender = $sender->sponsor_fname;
            }elseif($user->user_type=='student'){
                $sender = Student::find($message->msg_sender)->student_fname;
            }
            $messages[] = array(
                'content'=>$message->msg_content,
                'sender'=>$sender,
                'id'=>$message->msg_id,
                'timestamp'=>$message->created_at->diffForHumans()
                );
        }
        return $messages;
    }

    public function getUnreadMsg(){
        $user_id = Auth::user()->user_id;
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->get();
        // $name =
        $messages = array();
        foreach($unread as $message){
            $user = User::find($message->msg_sender);
            if($user->user_type=='sponsor'){
                $sender = Sponsor::find($user->user_id);
                // $sender = Sponsor::pluck('fullname','user_id');
                // $sender = Sponsor::select(DB::raw("CONCAT('sponsor_fname','sponsor_lname') AS full"))-where('user_id','=',$user->user_id)->get();
                // $sender= $sender->full;
                // return $sender; 
                $sender = $sender->sponsor_fname;
                // $senderName += $sender->sponsor_lname;
            }elseif($user->user_type=='student'){
                $sender = Student::find($message->msg_sender)->student_fname;
            }
            $messages[] = array(
                'content'=>$message->msg_content,
                'sender'=>$sender,
                'id'=>$message->msg_id,
                'timestamp'=>$message->created_at->diffForHumans()
                );
        }
        return $messages;
    }


    public function getAllMsg(){
        $user_id = Auth::user()->user_id;
        $inbox = Message::where('msg_receiver','=',$user_id)->get();

        $messages = array();
        foreach($inbox as $message){
            $user = User::find($message->msg_sender);
            if($user->user_type=='sponsor'){
                $sender = Sponsor::find($user->user_id);
                $sender = $sender->sponsor_fname;
            }elseif($user->user_type=='student'){
                $sender = Student::find($message->msg_sender)->student_fname;
            }
            $messages[] = array(
                'content'=>$message->msg_content,
                'id'=>$message->msg_id,
                'sender'=>$sender,
                'timestamp'=>$message->created_at->diffForHumans()
                );
        }
        return $messages;
    }



    public function send(Request $request){
        $currentTime = Carbon::now()->toDateTimeString();
        $receiver = $request->to;
        $receiver_id = Auth::user()->where('email','=',$receiver)->pluck('user_id');
        $user_id = Auth::user()->user_id;

        $message = new Message;

        $message->msg_sender=$user_id;
        $message->msg_receiver=$receiver_id;
        $message->msg_content=$request->content;
        $message->msg_status='unread';
        $message->msg_date=$currentTime;
        $message->msg_subject=$request->subject;

        $message->save();
        return $message;
    }

    public function showThread(Request $request){
        return "yes";
    }
}