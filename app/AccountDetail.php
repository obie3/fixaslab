<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model
{
    protected $fillable = ['account_number', 'account_balance', 'account_type_id', 'customer_profile_id'];

    public function customer_profile(){
        return $this->belongsTo('App\CustomerProfile');
    }

    public function account_type(){
        return $this->belongsTo('App\AccountType');
    }

}
