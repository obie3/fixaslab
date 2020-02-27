<?php

namespace App\Repositories\AccountDetail;

interface AccountDetailContract {
    public function create($request);
    public function all();
    // public function edit($bankId, $request);
    // public function findAll();
    // public function findById($bankId);
    // public function remove($bankId);

}
