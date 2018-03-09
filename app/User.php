<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username','surnames', 'email','movil','sector','avatar','website', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Un usuario tendra n customers
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers(){
        return $this->hasMany(Customer::class)->latest();
    }

    public function contacts(){
        return $this->hasMany(Contact::class)->latest();
    }

    public function products(){
        return $this->hasMany(Product::class)->latest();
    }

    public function bills(){
        return $this->hasMany(Bills::class)->latest();
    }

}
