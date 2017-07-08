<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;
use App\Balance;
use App\Message;

use App\Http\Controllers\Api\MessageApiController;

use Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {   
        $user = Sentinel::getUser();

        $messages = [];

        if ($type == 1) {
            $messages = $user->output_messages;
        } else {
            $messages = $user->income_messages;
        }

        $data = [
            'user' => $user,
            'messages' => $messages,
            'type' => $type,
        ];
        return view('messages.inbox', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Sentinel::getUser();
        $data = [
            'user' => $user,
        ];
        return view('messages.new_message', $data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $user = Sentinel::getUser();
        $type = $request->get('type');
        $message = Message::where('id','=',$id)->first();

        if (!empty($type) && !empty($message) && ($user->id == $message->sender_id || $user->id == $message->recipient_id)) {
             $data = [
                'user' => $user,
                'message' => $message,
                'type' => $type,
            ];
            $view = view('messages.show', $data)->render();

            return ['response' => 200, 'data' => $view];
        }

        return ['response' => 404, 'text' => 'Сообщение не найдено'];
    }
}
