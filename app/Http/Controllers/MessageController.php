<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;
use App\Balance;


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
        $data = [
                'user' => $user,
            ];
        return view('privat_office._partials.input_message', $data);
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
        return view('privat_office._partials.new_message', $data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = Sentinel::getUser();
        $data = [
            'user' => $user,
        ];
        return view('privat_office._partials.output_message', $data);
    }
}
