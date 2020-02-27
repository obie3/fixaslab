<?php
namespace App\Repositories\Transaction;

use  App\Transaction;
use  App\CustomerProfile;
use  App\AccountDetail;
use Exception;
use DB;


use App\Repositories\Transaction\TransactionContract;

class EloquentTransactionRepository implements TransactionContract {

    public function create($request) {
        DB::beginTransaction();
        try {
            $account_details = $this->getAccountDetails($request->account_number);
            $transaction_type = $request->transaction_type;
            $amount = $request->amount;
            $current_balance = $account_details->account_balance;
            $min_balance = $account_details->account_type->minimum_balance;
            $request['user_id'] = $account_details->customer_profile_id;
            $transaction_status = $this->compute($transaction_type, $amount, $current_balance, $min_balance, $account_details);
            if($transaction_status) {
                $transaction = new Transaction;
                $this->setTransactionProperties($transaction, $request);
                $status = $transaction->save();
                DB::commit();
                return 'Transaction successful';
            }
            return 'Insufficient funds';
        } catch (Exception $ex) {
            DB::rollback();
            return $ex;
        }
    }


    public function all(){
        return Transaction::with(['customer_profile'])
        ->orderBy('created_at', 'Desc')
        ->get();
    }

    public function getAccountDetails($account_number) {
        return AccountDetail::with(['customer_profile', 'account_type'])
        ->where('account_number', $account_number)->first();
    }

    public function compute($transaction_type, $amount, $current_balance, $min_balance, $account_balance ) {
        $result = false;
        $newBalance = 0;
        if($transaction_type == 'deposit') {
            $newBalance = $amount + $current_balance;
            return $account_balance->update(['account_balance' => $newBalance]);
        } else if($transaction_type == 'withdrawal') {
            $newBalance = $current_balance - $amount;
            if($newBalance >= $min_balance) {
                return $account_balance->update(['account_balance' => $newBalance]);
            } else {
                return false;
            };
        }
    }


    private function setTransactionProperties($transaction, $request) {
        // Assign attributes to the customerprofile here
        $profile = CustomerProfile::find($request->user_id);
        $transaction->transaction_type = $request->transaction_type;
        $transaction->amount = $request->amount;
        $transaction->customer_profile_id = $request->user_id;
        $transaction->customer_profile = $profile->name;

    }

}
