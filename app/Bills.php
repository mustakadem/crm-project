<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bills extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

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

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}

