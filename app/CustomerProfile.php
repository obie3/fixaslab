<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    protected $fillable = ['name', 'gender', 'phone_number', 'address'];

    public function account_detail(){
        return $this->hasMany('App\AccountDetail');
    }

    public function transaction(){
        return $this->hasMany('App\Transaction');
    }

}
