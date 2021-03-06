<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;
use App\Comments;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {	 

        $value = session('key');

        $user = Sentinel::getUser();
        $comments = Comments::all();
        $referral = null;

        if (session()->has('ref')) {
            $reverralSlug = $request->session()->get('ref');
            $referral = User::select('id','first_name','surname','slug')->where('slug','=',$reverralSlug)->first();
        }

       	$data = [
    		'user' => $user,
            'comments' => $comments,
    		'referral' => $referral,
    	];

    	return view('home.index', $data);
    }

    public function bonus(Request $request)
    {   
        $user = Sentinel::getUser();
        $comments = Comments::all();
        $referral = null;

        if ($request->has('referral')) {
            $referral = User::select('id','first_name','surname','slug')->where('slug','=',$request->get('referral'))->first();
        }

        $data = [
            'user' => $user,
            'comments' => $comments,
            'referral' => $referral,
        ];

        return view('home.bonus', $data);
    }


    public function get_comment_video(Request $request) {
        $comments_id = $request->get('comment_id');


        if ( !empty($comments_id ) ) {
            $comments = Comments::where('id','=',$comments_id)->first();
                                       
            if ( !empty($comments) && count( $comments->video ) > 0 ){
                return ['response' => 200, 'data' => $comments->video];
            } else {
                return ['response' => 500, 'data' => 'Не найден comments']; 
            }
        } else {
             return ['response' => 500, 'data' => 'Не найден comments_id']; 
        }
    }
}
