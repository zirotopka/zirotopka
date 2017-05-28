<?php

use Illuminate\Database\Seeder;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	['name' => 'Клиент', 'slug' => 'client'],
        	['name' => 'Мэнеджер', 'slug' => 'manager'],
        	['name' => 'Админ', 'slug' => 'admin'],
        ];

        foreach ($roles as $role) {
        	$roleModel = new Role;
        	$roleModel->name = $role['name'];
        	$roleModel->slug = $role['slug'];
        	$roleModel->save();
        }
    }
}
