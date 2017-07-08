<?php

namespace App\Http\Controllers\Api;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;//Временно
use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Http\Controllers\Controller;

use Validator;

class MessageApiController extends Controller
{   
    /**
     * 1 = исходящие
     * 2 = входящие
     */
    /**
     * Полкчение списка сообщений
     * @param int $type Message type
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$user = $request->get('user');
        $user = Sentinel::getUser();

        if (empty($user)) {
            return response()->json(['code' => 404, 'text' => 'User not found']);
        }

        $type = $request->get('type');

        if (empty($type) || !in_array($type, [1,2])) {
             return response()->json(['code' => 404, 'text' => 'Type not found']);
        }

        if ($type = 1) {
            return response()->json(['code' => 200, 'text' => 'Output mesages', 'data' => $user->output_messages]);
        } else {
            return response()->json(['code' => 200, 'text' => 'Income mesages', 'data' => $user->income_messages]);
        }

        return response()->json(['code' => 501]);
    }


    /**
     * Сохранить письмо.
     *
     * @param int $type Message type
     * @param int $recipient_id Id получателя
     * @param int $sender_id Id отправителя
     * @param string $subject Тема
     * @param string $text Id Текст
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $rules = [
            'sender_id' => 'required|integer',
            'recipient_id' => 'required|integer',
        ];
        $messages = [
            'sender_id.required' => 'Sender not found',
            'sender_id.integer' => 'Sender is not int',
            'recipient_id.required' => 'Recipient not found',
            'recipient_id.integer' => 'Recipient is not int',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        //Проверка пользователя
        //$user = $request->get('user');
        $user = Sentinel::getUser();
        $recipient_id = $request->get('recipient_id');
        $sender_id = $request->get('sender_id');

        if ($user->id != $sender_id) {
            return response()->json(['code' => 406, 'text' => 'Uncorrect data id']);
        }

        $message = new Message;
        $message->recipient_id = $recipient_id;
        $message->sender_id = $sender_id;
        $message->subject = $request->get('subject');
        $message->text = $request->get('text');
        $message->is_read = 0;
        if ( $message->save() ) {
            return response()->json(['code' => 200, 'text' => 'Message is send', 'data' => $message->id]);
        } else {
            return response()->json(['code' => 400, 'text' => 'Message is not save']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //$user = $request->get('user');
        $user = Sentinel::getUser();
        $message = Message::select('id','text','subject','recipient_id','sender_id','is_read','created_at')->where('id', $id)->first();

        if (empty($message) && (($user->id != $message->recipient_id) || ($user->id != $message->sender_id))) {
            return response()->json(['code' => 406, 'text' => 'Message not exist']);
        } else {
            return response()->json(['code' => 200, 'text' => 'Message by id', 'data' => $message]);
        }
    }

    /**
     * Обновляем прочитано ли письмо (Временно только только) 
     * 
     *  @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        //$user = $request->get('user');
        $user = Sentinel::getUser();
        $message = Message::select('id','text','subject','recipient_id','sender_id','is_read')->where('id', $id)->first();

        if (empty($message) && (($user->id != $message->recipient_id) || ($user->id != $message->sender_id))) {
            return response()->json(['code' => 406, 'text' => 'Message not exist']);
        }

        $message->is_read = 1;
        if ( $message->save() ) {
            return response()->json(['code' => 200, 'text' => 'Message is read', 'data' => $message->id]);
        } else {
            return response()->json(['code' => 400, 'text' => 'Message is not save']);
        }
    }

    /**
     * Удаляем письмо
     *
     * @param  int  $id
     */
    public function destroy(Request $request, $id)
    {
        //$user = $request->get('user');
        $user = Sentinel::getUser();
        $message = Message::select('id')->where('id', $id)->first();

        if (empty($message) && (($user->id != $message->recipient_id) || ($user->id != $message->sender_id))) {
            return response()->json(['code' => 406, 'text' => 'Message not exist']);
        }

        if ( $message->destroy() ) {
            return response()->json(['code' => 200, 'text' => 'Message is delete', 'data' => $message->id]);
        } else {
            return response()->json(['code' => 400, 'text' => 'Message is not delete']);
        }
    }
}
