<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{	
	protected $table = 'files';
    protected $primaryKey = 'id';
    
    const TYPES = [
    	1 => 'logo',
    	2 => 'img',
    	3 => 'video'
    ];

    public function owner()
    {
        return $this->morphTo();
    }
}
