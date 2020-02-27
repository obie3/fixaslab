<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['transacion_type', 'amount', 'customer_profile_id', 'name'];

    public function customer_profile(){
        return $this->belongsTo('App\CustomerProfile');
    }
}
