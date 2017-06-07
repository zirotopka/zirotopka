<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivatOfficeController extends Controller
{
    public function index($id)
    {
    	return view('privat_office.index');
    }
}
