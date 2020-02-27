<?php

namespace App\Repositories\CustomerProfile;

interface CustomerProfileContract {
    public function create($request);
    public function all();
}
