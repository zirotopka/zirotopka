<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    
    const TYPES = [
    	1 => 'logo',
    	2 => 'img',
    	3 => 'video'
    ];
}
