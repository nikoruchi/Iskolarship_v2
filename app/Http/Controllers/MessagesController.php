<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Scholar;
use App\User;
use App\Sponsor;
use App\Message;
use Carbon\Carbon;
use App\Reply;
class MessagesController extends Controller
{
 
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
            $id = $message->msg_sender;
            if($user->user_type=='sponsor'){
                $sender = Sponsor::where('user_id','=',$id)->pluck('sponsor_fname');
            }elseif($user->user_type=='student'){
                $sender = Scholar::where('user_id','=',$id)->pluck('student_fname');
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
            $user = User::find($message->msg_sender);
            $id = $message->msg_sender;
            if($user->user_type=='sponsor'){
                $sender = Sponsor::where('user_id','=',$id)->pluck('sponsor_fname');
            }elseif($user->user_type=='student'){
                $sender = Scholar::where('user_id','=',$id)->pluck('student_fname');
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
            $id = $message->msg_sender;
            if($user->user_type=='sponsor'){
                $sender = Sponsor::where('user_id','=',$id)->pluck('sponsor_fname');
            }elseif($user->user_type=='student'){
                $sender = Scholar::where('user_id','=',$id)->pluck('student_fname');
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
        $email = Auth::user()->email;
        $message->user_email=$email;
        return $message;
    }

    public function sendreply(Request $request){
        $id = $request->id;
        $text = $request->text;
        
        $currentTime = Carbon::now()->toDateTimeString();
        $user_id = Auth::user()->user_id;
        
        $reply = new Reply;
        // return $reply;
        $reply->user_id=$user_id;
        $reply->msg_id=$id;
        $reply->reply_content=$text;
        $reply->created_at=$currentTime;
        $reply->save();
        
        $parentmsg = Message::find($id);
        $replies = Reply::where('msg_id','=',$id)->get();
        $user_id = Auth::user()->user_id;
        if(Auth::user()->hasRole('student')){
            $sender = Scholar::where('user_id','=',$user_id)->pluck('student_fname');
        }elseif(Auth::user()->hasRole('sponsor')){
            $sender = Sponsor::where('user_id','=',$user_id)->pluck('sponsor_fname');
        }

        $repliesMsgs[] = array(
            'content'=>$parentmsg->msg_content,
            'sender'=>$parentmsg->msg_sender,
            'sender_name'=>$sender,
            'id'=>$id,
            'timestamp'=>$parentmsg->created_at->diffForHumans()
         );
        foreach($replies as $reply){
        $user = User::find($reply->user_id);
        $id = $reply->user_id;
        if($user->user_type=='sponsor'){
            $sender = Sponsor::where('user_id','=',$id)->pluck('sponsor_fname');
        }elseif($user->user_type=='student'){
            $sender = Scholar::where('user_id','=',$id)->pluck('student_fname');
        }
        $repliesMsgs[] = array(
            'content'=>$reply->reply_content,
            'sender'=>$reply->user_id,
            'sender_name'=>$sender,
            'id'=>$reply->msg_id,
            'timestamp'=>$reply->created_at->diffForHumans()
            );
        }
        return $repliesMsgs;

    }

    public function showThread(Request $request){
        $id = $request->id;
        $auth = Auth::user()->user_id;
        $parentmsg = Message::find($id);
        $replies = Reply::where('msg_id','=',$id)->get();
        $user_id = Auth::user()->user_id;
        if(Auth::user()->hasRole('student')){
            $sender = Scholar::where('user_id','=',$user_id)->pluck('student_fname');
        }elseif(Auth::user()->hasRole('sponsor')){
            $sender = Sponsor::where('user_id','=',$user_id)->pluck('sponsor_fname');
        }

        $repliesMsgs[] = array(
            'content'=>$parentmsg->msg_content,
            'sender'=>$parentmsg->msg_sender,
            'sender_name'=>$sender,
            'id'=>$id,
            'timestamp'=>$parentmsg->created_at->diffForHumans(),
            'user'=>$auth
         );

        $replies = Reply::where('msg_id','=',$id)->orderBy('created_at','ASC')->get();
        $repliesMsgs = array();
        foreach($replies as $reply){
            $user = User::find($reply->user_id);
            $id = $reply->user_id;
            if($user->user_type=='sponsor'){
                $sender = Sponsor::where('user_id','=',$id)->pluck('sponsor_fname');
            }elseif($user->user_type=='student'){
                $sender = Scholar::where('user_id','=',$id)->pluck('student_fname');
            }
            $repliesMsgs[] = array(
                'content'=>$reply->reply_content,
                'sender'=>$reply->user_id,
                'sender_name'=>$sender,
                'id'=>$reply->msg_id,
                'timestamp'=>$reply->created_at->diffForHumans(),
                'user'=>$auth
                );

        }
        return $repliesMsgs;
    }    

    public function destroy(Request $request){
       // $id = $request->
       return $request;
    }

    public function compose(){
        return "yay";
    }

    public function readMessage(Request $request){
        $id = $request->id;
        $message = Message::find($id);
        $message->msg_status='read';
        $message->save();
        return $message;
        // return redirect()->back();
    }
}