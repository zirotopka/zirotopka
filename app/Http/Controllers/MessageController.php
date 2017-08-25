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

        if ($type == 1) {
            $messages = $user->output_messages()->paginate(10);
        } else {
            $messages = $user->income_messages()->paginate(10);
        }

        $data = [
            'user' => $user,
            'messages' => $messages,
            'type' => $type,
        ];
        return view('messages.inbox', $data);
    }

	public function index_admin($type)
	{
		$user = Sentinel::getUser();

		if ($type == 1) {
			$messages = Message::where('sender_id','=',1)->with('outputs','files')->orderBy('created_at','desc')->paginate(10);

		} else {
			$messages = Message::where('recipient_id','=',1)->with('outputs','files')->orderBy('created_at','desc')->paginate(10);
		}

		$data = [
			'user' => $user,
			'messages' => $messages,
			'type' => $type,
		];

		return view('admin.messages.inbox', $data);
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

	public function sendAll(Request $request)
	{
		$user = Sentinel::getUser();
		$data = [
			'user' => $user,
			'recipient_id' => -1
		];
		return view('admin.messages.new_message', $data);
	}

	public function create_admin($recipient_id, Request $request)
	{
		$user = Sentinel::getUser();
		$data = [
			'user' => $user,
			'recipient_id' => $recipient_id
		];
		return view('admin.messages.new_message', $data);
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
        $message = Message::where('id','=',$id)->with('outputs','files')->first();
        
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

	public function show_admin($id, Request $request)
	{
		$user = Sentinel::getUser();
		$type = $request->get('type');
		$message = Message::where('id','=',$id)->with('outputs','files')->first();

		if (!empty($type) && !empty($message) && ($user->id == $message->sender_id || $user->id == $message->recipient_id)) {
			$data = [
				'user' => $user,
				'message' => $message,
				'type' => $type,
			];
			$view = view('admin.messages.show', $data)->render();

			return ['response' => 200, 'data' => $view];
		}

		return ['response' => 404, 'text' => 'Сообщение не найдено'];
	}
}
