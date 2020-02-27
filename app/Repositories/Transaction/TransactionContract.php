<?php

namespace App\Repositories\Transaction;

interface TransactionContract {
    public function create($request);
    public function all();
    public function findByAccountNumber($account_number);
}
