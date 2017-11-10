<?php

use Illuminate\Database\Seeder;
use App\FreeAccess;

class FreeAccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	FreeAccess::truncate();
    	
        for ($i=0;$i<100;$i++) {
        	$freeAccess = new FreeAccess;
        	$freeAccess->code = md5(uniqid(rand(), true));;
        	$freeAccess->save();
        }
    }
}
