<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class BodyCssComposer
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
        $route = Route::current();

        if (isset($route)) {
            $view->with('bodyCss', str_replace('/','-',str_replace(['{','}'], '', $route->uri)));
        }

        $user = Sentinel::getUser();
        $_personalArea = 'ПРОГРАММА';

        if (!empty($user)) {
            $role = $user->roles->first();

            if (!empty($role)) {
                switch ($role->slug) {
                    case 'arbitrage':
                        $_personalArea = 'ЛИЧНЫЙ КАБИНЕТ';
                        break;
                    
                    default:
                        $_personalArea = 'ПРОГРАММА';
                        break;
                }
            }

            $view->with('user', $user);
        }

        $view->with('_personalArea', $_personalArea);
    }
}
