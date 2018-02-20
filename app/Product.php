<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded=[
        'id','created_at','update_at'
    ];

    public function bills(){
        return $this->belongsToMany(Bills::class);
    }
}
