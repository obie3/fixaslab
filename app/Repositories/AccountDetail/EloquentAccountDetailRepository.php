<?php
namespace App\Repositories\AccountDetail;

use  App\AccountDetail;
use App\Repositories\AccountDetail\AccountDetailContract;
use Faker\Factory as Faker;
use Log;

class EloquentAccountDetailRepository implements AccountDetailContract {

    public function create($request) {
        $profile = new AccountDetail;
        // Set the customer Account properties
        $this->setAccountDetailProperties($profile, $request);
        $profile->save();
        return $profile;
    }

    public function all(){
        return AccountDetail::with(['customer_profile', 'account_type', 'transaction'])
        ->orderBy('created_at', 'Desc')
        ->get();
    }


    private function setAccountDetailProperties($profile, $request) {
        $faker = Faker::create();
        // Assign attributes to the customer Account Profile here
        $profile->account_number = $faker->bankAccountNumber;
        $profile->account_type_id = $request->account_type_id;
        $profile->account_balance = $request->account_balance;
        $profile->customer_profile_id = $request->user_id;
    }

}
