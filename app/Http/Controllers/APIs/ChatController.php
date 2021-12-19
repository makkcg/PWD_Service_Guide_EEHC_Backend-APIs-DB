<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Events\ChannelID;
use App\Traits\FileManagement;

class ChatController extends Controller
{
    use FileManagement;

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */

    public function chat()
    {

       //chat messages
      $chat=Chat::where('user_id',auth()->user()->id)->first();
        if(!isset($chat))
           return  $this->response([]);
      $chatMessages= Message::where('chat_id', $chat->id)->get();
      //mark as read
       // $message= Message::where('chat_id', $chat->id)->update(['read' => 1]);
        return $this->response($chatMessages);
    }


    public function openChat(Request $request)
    {
        $chatIsset=Chat::where('deaf_id',auth()->user()->id)->where('employee_id', $request->employee_id)->first();
        if(!isset($chatIsset)){
            Chat::create([
                'deaf_id' =>auth()->user()->id,
                'employee_id' => $request->employee_id
            ]);
        }
        $chat=Chat::where('deaf_id',auth()->user()->id)->where('employee_id', $request->employee_id)->first();
        return response()->success($chat , trans("api/user.registered_successfully"));

    }


    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
    $chatIsset=Chat::where('user_id',auth()->user()->id)->first();
    if(!isset($chatIsset)){
        Chat::create([
            'user_id' =>auth()->user()->id
        ]);
    }
    $user = Auth::user();
    $chat=Chat::where('user_id',auth()->user()->id)->first();

    $request->validate(
    [
        'message'             => 'required'
    ]);

    $message= $chat->message()->create(
    [
        'message'           => $request->message,
        'sender_id'         => $user->id,
        'user_view'         => 1,

    ]);

    //event(new ChannelID($chat->id));
    broadcast(new MessageSent($user, $message))->toOthers();

    return $this->response([], trans('api.messageSent'));
}

    public function markRead()
        {
        //chat messages
        $chat=Chat::where('user_id',auth()->user()->id)->first();
            if(!isset($chat))
            return  $this->error(trans("api.wrong"));
        //mark as read
         $message= Message::where('chat_id', $chat->id)->update(['user_view' => 1]);
            return $this->response([],trans('api.done'));
        }

//  public function saveToken(Request $request)
//     {
//        $request->validate(
//             [
//                 'device_token'          => 'required' ,
//                 ]);
//         $user= auth()->user();
//         $user->device_token=$request->device_token;
//         $user->update();
//         return $this->response([],trans('api.done'));

//     }

    }


