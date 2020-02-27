<?php
namespace App\Repositories\CustomerProfile;

use  App\CustomerProfile;
use App\Repositories\CustomerProfile\CustomerProfileContract;

class EloquentCustomerProfileRepository implements CustomerProfileContract {

    public function create($request) {
        $profile = new CustomerProfile;
        // Set the customer profile properties
        $this->setCustomerProfileProperties($profile, $request);
        return $profile->save();
    }

    public function all(){
        return CustomerProfile::with(['account_detail', 'account_detail.account_type'])
        ->orderBy('created_at', 'Desc')
        ->get();
    }


    private function setCustomerProfileProperties($profile, $request) {
        // Assign attributes to the customerprofile here
        $profile->name = $request->name;
        $profile->phone_number = $request->phone_number;
        $profile->address = $request->address;
        $profile->gender = $request->gender;
    }

}
