<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Role;

class AddArbitrageRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $roles = [
            ['name' => 'Арбитраж', 'slug' => 'arbitrage'],
        ];

        foreach ($roles as $role) {
            $roleModel = new Role;
            $roleModel->name = $role['name'];
            $roleModel->slug = $role['slug'];
            $roleModel->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Role::where('slug','=','arbitrage')->delete();
    }
}
