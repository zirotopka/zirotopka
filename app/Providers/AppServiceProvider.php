<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        Sentinel::getUserRepository()->setModel('App\User');
        Sentinel::getPersistenceRepository()->setUsersModel('App\User');

        Schema::defaultStringLength(191);

        Relation::morphMap([
            'user' => \App\User::class,
            'exercive' => \App\ProgrammExercive::class,
            'training' => \App\Training::class,

            'message' => \App\Message::class,
            'message_answer' => \App\MessageAnswer::class,

            'programm_exercive' => \App\ProgrammExercive::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
