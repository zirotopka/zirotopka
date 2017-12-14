<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;

use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function index(Request $request){
        $user = Sentinel::getUser();
        $referral = null;

        if (session()->has('ref')) {
            $reverralSlug = $request->session()->get('ref');
            $referral = User::select('id','first_name','surname','slug')->where('slug','=',$reverralSlug)->first();
        }

        $data = [
            'user' => $user,
            'referral' => $referral,
        ];
        
        return view('affiliate.index', $data);
    }
}
