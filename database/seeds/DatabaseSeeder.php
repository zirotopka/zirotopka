<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\AccrualType;

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
        	['name' => 'Менеджер', 'slug' => 'manager'],
        	['name' => 'Админ', 'slug' => 'admin'],
        ];

        foreach ($roles as $role) {
        	$roleModel = new Role;
        	$roleModel->name = $role['name'];
        	$roleModel->slug = $role['slug'];
        	$roleModel->save();
        }

        AccrualType::truncate();

        $accruals_types = [
            ['id' => 1, 'slug' => 'replenishment', 'name' => 'Пополнение'],
            ['id' => 2, 'slug' => 'write-off', 'name' => 'Списание'],
        ];

        foreach ( $accruals_types as $accruals_type ) {
            $type = new AccrualType;
            $type->id = $accruals_type['id'];
            $type->slug = $accruals_type['slug'];
            $type->name = $accruals_type['name'];

            $type->save();
        }
    }
}
