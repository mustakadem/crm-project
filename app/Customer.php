<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded=[
        'id','created_at','update_at'
    ];

    public function bills(){
        return $this->hasMany(Bills::class);
    }
}
