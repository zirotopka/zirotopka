<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreeAccess extends Model
{
    protected $table = 'free_accesses';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
