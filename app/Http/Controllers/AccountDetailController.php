<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AccountDetail\AccountDetailContract;
use Validator;
use Exception;
class AccountDetailController extends Controller
{
    protected $accountDetailModel;
    public function __construct(AccountDetailContract $accountDetailContract){
        $this->accountDetailModel = $accountDetailContract;
    }

    public function index() {
        $data = $this->accountDetailModel->all();
        $message = ''; $statusCode = '';
        if(sizeof($data) > 0) {
            $message = ['success' => 'Records returned', 'data' => $data];
        }
        else {
            $message = ['info' => 'No record found', 'data' => $data];
        }
        return response()->json($message, 200);
    }

    public function store(Request $request) {
        try {
            $data = $request->json()->all();
            $validator =  Validator::make($data, [
                'account_type_id' => 'required|max:10',
                'account_balance' => 'required|numeric|min:0',
                'user_id' => 'required|numeric|min:0',
            ]);

            if($validator->fails()) {
                $res = $validator->errors()->first();
                $message = ['error' => 'Missing field found', 'message' => $res];
                return response()->json($message, 400);
            }

            $req = $this->accountDetailModel->create($request);
            if($req) {
                $message = ['success' => 'Account created successfully', 'data' => $req];
                return response()->json($message, 201);
            }

            $message = ['error' => 'something went wrong', 'message' => $req];
            return response()->json($message, 400);
        }
        catch(Exception $ex) {
            $message = ['db eror' => $ex];
            return response()->json($message, 500);
        }
    }

    public function edit() {

    }

    public function update() {

    }

    public function delete() {

    }
}
