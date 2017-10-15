<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Role;

class AddRolePretender1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Role::where('slug','=','pretender')->delete();

        $roleModel = new Role;
        $roleModel->name = 'Претендент';
        $roleModel->slug = 'pretender';
        $roleModel->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Role::where('slug','=','pretender')->delete();
    }
}
