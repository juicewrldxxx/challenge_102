<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\room;
use App\Models\User;
use Illuminate\Http\Request;

class messageController extends Controller
{
    public $message;
    public $room;
    public $user;
    public function __construct(message $message, room $room, User $user)
    {
        $this->message = $message;
        $this->room = $room;
        $this->user = $user;
    }
    public function handleSendMessage(Request $request)
    {
        if ($request->room_id == "") {
            $roomItem = $this->room->create([]);
            $roomItem->user()->attach($request->userSend_id);
            $roomItem->user()->attach($request->userGet_id);
        } else {
            $roomItem = $this->room->where('id',$request->room_id)->first(); 
        }

        $messageData = array(
            'user_id' => $request->userSend_id,
            'text' => $request->text,
            'room_id' => $roomItem->id
        );
        $this->message->create($messageData);

        return back();
    }
}
