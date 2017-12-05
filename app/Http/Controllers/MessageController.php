<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;
use App\Balance;
use App\Message;

use DB;
use App\Quotation;

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
            $is_send = true;
        } else {
            $messages = $user->income_messages()->paginate(10);
            $is_send = false;
        }

        $data = [
            'user' => $user,
            'messages' => $messages,
            'type' => $type,
            'is_send' => $is_send,
        ];
        return view('messages.inbox', $data);
    }

	public function index_admin($type)
	{
		$user = Sentinel::getUser();

		if ($type == 1) {
			$messages = Message::where('sender_id','=',$user->id)->with('outputs','files')->orderBy('created_at','desc')->paginate(10);
            $is_send = true;
		} else {
			$messages = Message::where('recipient_id','=',0)->with('outputs','files')->orderBy('created_at','desc')->paginate(10);
            $is_send = false;
		}

		$data = [
			'user' => $user,
			'messages' => $messages,
			'type' => $type,
            'is_send' => $is_send,
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

		$users = User::select('id','first_name','surname')->get();
		$data = [
			'user' => $user,
			'users' => $users,
			'recipient_id' => -1
		];
		return view('admin.messages.send_all', $data);
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
        $userRole = $user->role_id;
        $type = $request->get('type');
        $message = Message::where('id','=',$id)->with('outputs','files')->first();

        if (!empty($type) && !empty($message) && ($user->id == $message->sender_id || $message->recipient_id == $user->id)) {
            if ($user->id == $message->recipient_id) {
                $message->is_read = 1;
                $message->save();
            }
        	
            $data = [
                'user' => $user,
                'message' => $message,
                'type' => $type,
            ];

			$user_role = DB::table('role_users')->where('user_id', '=', $user->id)->first();

			if ($userRole == 4) {
				$view = view('admin.messages.show', $data)->render();
			} else {
				$view = view('messages.show', $data)->render();
			}

            return ['response' => 200, 'data' => $view];
        }

        return ['response' => 404, 'text' => 'Сообщение не найдено'];
    }

	public function show_admin($id, Request $request)
	{
		$user = Sentinel::getUser();
		$type = $request->get('type');
		$message = Message::where('id','=',$id)->with('outputs','files')->first();

		if (!empty($type) && !empty($message) && ($user->id == $message->sender_id || $message->recipient_id == 0)) {
			if ($message->recipient_id == 0) {
        		$message->is_read = 1;
        		$message->save();
        	}

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
