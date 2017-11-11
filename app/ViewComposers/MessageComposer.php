<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Message;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class MessageComposer
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view) {
        $user = Sentinel::getUser();

        if (!empty($user)) {
            $newMessages = Message::where('recipient_id','=',$user->id)->where('is_read','=',0)->count();
            $view->with('newMessages', $newMessages);
        }
    }
}
