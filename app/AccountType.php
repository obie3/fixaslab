<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $fillable = ['title', 'minimum_balance'];

    public function account_detail(){
        return $this->hasMany('App\AccountDetail');
    }

}
