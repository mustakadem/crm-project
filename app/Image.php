<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded=[
        'id','created_at','update_at'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
