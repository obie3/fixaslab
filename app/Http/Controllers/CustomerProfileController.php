<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerProfile\CustomerProfileContract;


class CustomerProfileController extends Controller
{
    protected $customerProfileModel;
    public function __construct(CustomerProfileContract $customerProfileContract){
        $this->customerProfileModel = $customerProfileContract;
    }

    public function index() {
        $data = $this->customerProfileModel->all();
        $message = ''; $statusCode = '';
        if(sizeof($data) > 0) {
            $message = ['success' => 'Records returned', 'data' => $data];
            $statusCode = '200';
        } else {
            $message = ['info' => 'No Record Found'];
            $statusCode = '204';
        }
        return response()->json($message, $statusCode);
    }

    public function create(Request $request) {

    }

    public function edit() {

    }

    public function update() {

    }

    public function delete() {

    }
}
