<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
            $view->with('bodyCss', $route->uri);
        }
    }
}
