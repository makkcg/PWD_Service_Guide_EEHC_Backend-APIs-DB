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

    public function scanChat(Request $request)
    {
         $request->validate(
            [
                'employee_id'            => 'required|integer',
            ]);
        $chatIsset=Chat::where('deaf_id',auth()->user()->id)->where('employee_id', $request->employee_id)->first();
        if(!isset($chatIsset)){
          $chat = Chat::create([
                'deaf_id' =>auth()->user()->id,
                'employee_id' => $request->employee_id,
                'status' => 1,
            ]);
        }
        else{
            $chat=Chat::where('deaf_id',auth()->user()->id)->where('employee_id', $request->employee_id)->first();
            $chat->update('status', 1);
        }
        return response()->success($chat , trans("api/user.registered_successfully"));
    }

    public function openChatForDeaf()
    {
        $chat=Chat::where('deaf_id',auth()->user()->id)->where('status', 1)->first();
         Message::where('chat_id', $chat->id)->update(['deaf_view' => 1]);
        return response()->success($chat , trans("api/user.registered_successfully"));
    }

    public function endChatForDeaf()
    {
      Chat::where('deaf_id',auth()->user()->id)->update('status', 0);
        return response()->success([] , trans("api/user.registered_successfully"));
    }

    public function openChatForEmployee()
    {
        $chat=Chat::where('employee_id',auth()->user()->id)->where('status', 1)->first();
        Message::where('chat_id', $chat->id)->update(['employee_view' => 1]);
        return response()->success($chat , trans("api/user.registered_successfully"));
    }

    public function endChatForEmployee()
    {
        Chat::where('employee_id',auth()->user()->id)->update('status', 0);
        return response()->success([] , trans("api/user.registered_successfully"));
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {

   $data = $request->validate(
        [
            'chat_id'            => 'required|integer',
            'message'             => 'required'
        ]);
    $chat=Chat::find($request->chat_id)->first();

       if($chat->employee_id == auth()->user()->id) {
           $data['type'] = 1 ;
           $data['deaf_view'] = 0;
           $data['employee_view'] = 1;

       }

       elseif($chat->deaf_id == auth()->user()->id) {
           $data['type'] = 2 ;
           $data['deaf_view'] = 1;
           $data['employee_view'] = 0;
       }
    $message= $chat->message()->create();

  //  broadcast(new MessageSent($user, $message))->toOthers();

    return $this->response([], trans('api.messageSent'));
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


