<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded=[
        'id','created_at','update_at'
    ];
}
