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
    public function indexSponsor()
    {
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id');
        $sponsor = Sponsor::findOrFail($id);
        $inbox = Message::where('msg_receiver','=',$user_id)->get();
        return view('/user/messages', compact('sponsor','user','inbox'));
    }

    public function indexStudent()
    {
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        $student = Scholar::findOrFail($stud_id);
        $inbox = Message::where('msg_receiver','=',$user_id)->get();
        return view('/user/messages', compact('student','user','inbox'));
    }

    public function getReadMsg(){
        $user_id = Auth::user()->user_id;
        $read = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','read')->get();
        $messages = array();
        foreach($read as $message){
            $user = User::find($message->msg_sender);
            if($user->user_type=='sponsor'){
                $sender = Sponsor::find($user->user_id);          
                $sender = $sender->sponsor_fname;

            }elseif($user->user_type=='student'){
                $sender = Scholar::find($message->msg_sender)->student_fname;
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
        $messages = array();
        foreach($unread as $message){
            $msg = $message->msg_sender;
            $user = User::find($msg);
            if($user->user_type=='sponsor'){
                $sender = Sponsor::where('user_id','=',$msg)->sponsor_fname;
            }
            if($user->user_type=='student'){
                $sender = Scholar::where('user_id','=',$msg)->student_fname;
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
                $sender = Scholar::find($message->msg_sender)->student_fname;
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
        $receiver_id = Auth::user()->where('email','=',$receiver)->pluck('user_id')->first();
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

    public function destroy(Request $request){
       return $request;
        // Message::destroy($request->messages);
        // return "yay";
    }
}