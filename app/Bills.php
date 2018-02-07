<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $guarded=[
        'id','created_at','update_at'
    ];



    public function products()
    {
        return $this->belongsToMany(Product::class);

    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

