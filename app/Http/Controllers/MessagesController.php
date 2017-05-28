<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Auth;
use App\Scholar;
use App\User;
use App\Sponsor;
use App\Message;
use Carbon\Carbon;
use App\Reply;
class MessagesController extends Controller
{
    public function autofillMsgSponsor($sponsor){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $stud_id = Scholar::where('user_id','=', $user_id)->pluck('student_id')->first();
        // dd($stud_id);
        $student = Scholar::findOrFail($stud_id);

        $data['sponsor']=$sponsor;
        $user1 = Sponsor::where('sponsor_id', '=', $data['sponsor'])->pluck('user_id')->first();

        $email = User::where('user_id','=',$user1)->pluck('email');
        $inbox = Message::where('msg_receiver','=',$user_id)->get();
        return view('/user/messages', compact('sponsor', 'student','user', 'email', 'inbox'));
    }

    public function autofillMsgScholar($studentProfile){
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $spon_id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($spon_id);

        $data['studentProfile']=$studentProfile;
        $user1 = Scholar::where('student_id', '=', $data['studentProfile'])->pluck('user_id');

        $email = User::where('user_id','=',$user1)->pluck('email');
        $inbox = Message::where('msg_receiver','=',$user_id)->get();
        return view('/user/messages', compact('sponsor','user', 'email', 'inbox','studentProfile'));
    }

    public function indexSponsor()
    {
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
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
        // $sender = User::
        // $senderName = 
        return view('/user/messages', compact('student','user','inbox'));
    }


    public function sendSpecific($emailadd){
        $email = $emailadd;
        $user_id = Auth::user()->user_id;
        $user = User::findOrFail($user_id);
        $id = Sponsor::where('user_id','=', $user_id)->pluck('sponsor_id')->first();
        $sponsor = Sponsor::findOrFail($id);
        $inbox = Message::where('msg_receiver','=',$user_id)->get();

        return view('/user/messages', compact('sponsor','email','user','inbox'));

    }

    public function getReadMsg(){
        $user_id = Auth::user()->user_id;
        $read = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','read')->get();
        $messages = $this->messages($read);
        return $messages;
    }

    public function getUnreadMsg(){
        $user_id = Auth::user()->user_id;
        $unread = Message::where('msg_receiver','=',$user_id)->where('msg_status','=','unread')->get();
        $messages = $this->messages($unread);
        return $messages;
    }


    public function getAllMsg(){
        $user_id = Auth::user()->user_id;
        $inbox = Message::where('msg_receiver','=',$user_id)->get();
        $messages = $this->messages($inbox);
        return $messages;
    }

    public function messages($data){
        $user_id=Auth::user()->user_id;
        $messages = array();
        foreach($data as $message){
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
                'sender'=>$msg_sender,
                'sender_name'=>$sender,
                'timestamp'=>$message->created_at->diffForHumans(),
                'user'=>$user_id
                );
        }
        return $messages;
    }

    public function send(Request $request){
        $validator = Validator::make($request->all(),[
            'to' => 'exists:users,email',
            'content' => 'required',
            'subject' => 'required'
            ]);
        if ($validator->fails()) {
             if($request->ajax()){
                return response()->json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 422);
            }

            $this->throwValidationException(
                $request, $validator
            );
        }
        else{
            
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
    }

    public function messageAndReplies($id){
        $parentmsg = Message::find($id);
        $replies = Reply::where('msg_id','=',$id)->get();   
        
        $sender_id = $parentmsg->msg_sender;
        $sender = User::find($sender_id);
        // append original message in beggining of array
        $user_id = Auth::user()->user_id;
        if($sender->user_type=='student'){
            $sender = Scholar::where('user_id','=',$sender_id)->pluck('student_fname');
        }elseif($sender->user_type=='sponsor'){
            $sender = Sponsor::where('user_id','=',$sender_id)->pluck('sponsor_fname');
        }
        $repliesMsgs[] = array(
            'content'=>$parentmsg->msg_content,
            'sender'=>$parentmsg->msg_sender,
            'sender_name'=>$sender,
            'id'=>$id,
            'timestamp'=>$parentmsg->created_at->diffForHumans(),
            'user'=>$user_id
        );

        // replies append on array
        foreach($replies as $reply){
            $senderArray = User::find($reply->user_id);
            $id = $reply->user_id;
            if($senderArray->user_type=='sponsor'){
                $sender = Sponsor::where('user_id','=',$id)->pluck('sponsor_fname');
            }elseif($senderArray->user_type=='student'){
                $sender = Scholar::where('user_id','=',$id)->pluck('student_fname');
            }
            $repliesMsgs[] = array(
                'content'=>$reply->reply_content,
                'sender'=>$reply->user_id,
                'sender_name'=>$sender,
                'id'=>$reply->msg_id,
                'timestamp'=>$reply->created_at->diffForHumans(),
                'user'=>$user_id
                );
            }
        return $repliesMsgs;
    }

    public function sendreply(Request $request){

        $validator = Validator::make($request->all(),[
            'text' => 'required',
            ]);
        if ($validator->fails()) {
             if($request->ajax()){
                return response()->json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 422);
            }

            $this->throwValidationException(
                $request, $validator
            );
        }
        else{
            $id = $request->id;
            $text = $request->text;        
            $currentTime = Carbon::now()->toDateTimeString();
            $user_id = Auth::user()->user_id;

            $reply = new Reply;
            $reply->user_id=$user_id;
            $reply->msg_id=$id;
            $reply->reply_content=$text;
            $reply->created_at=$currentTime;
            $reply->save();
            
            $thread = $this->messageAndReplies($id);
            return $thread;
        }
    }

    public function showThread(Request $request){
        $id = $request->id;
        $auth = Auth::user()->user_id;      
        $thread = $this->messageAndReplies($id);
        return $thread;
    }    

    public function destroy(Request $request){
        $messages = $request->ids;
        foreach($messages as $message){
            $msg = Message::find($message);
            $msg->delete();
        }
        $updated = $this->getAllMsg();
        return $updated;
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