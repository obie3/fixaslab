<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Transaction\TransactionContract;
use Validator;
use Exception;

class TransactionController extends Controller
{
    protected $transactionModel;
    public function __construct(TransactionContract $transactionContract){
        $this->transactionModel = $transactionContract;
    }

    public function index() {
        $data = $this->transactionModel->all();
        $message = '';
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
                'amount' => 'required|numeric|min:0',
                'account_number' => 'required|numeric',
                'transaction_type' => 'required',
            ]);

            if($validator->fails()) {
                $res = $validator->errors()->first();
                $message = ['error' => 'Missing field found', 'message' => $res ];
                return response()->json($message, 400);
            }
            $req = $this->transactionModel->create($request);
            if($req) {
                if($req == 'Transaction successful') {
                    $message = ['success' => $req];
                    $statusCode = 201;
                } else {
                    $message = ['info' => $req];
                    $statusCode = 200;
                }
                return response()->json($message, $statusCode);
            }
            $message = ['error' => $req];
            return response()->json($message, 400);
        }
        catch(Exception $ex) {
            $message = ['error' => $ex];
            return response()->json($message, 500);
        }
    }

    public function filterByAccount($account_number) {
        // $data = $account_number;
        //     $validator =  Validator::make($data, [
        //         'account_number' => 'required|numeric',
        //     ]);

        //     if($validator->fails()) {
        //         $res = $validator->errors()->first();
        //         $message = ['error' => 'Invalid data', 'message' => $res ];
        //         return response()->json($message, 400);
        //     }
        $data = $this->transactionModel->findByAccountNumber($account_number);
        $message = '';
        if(sizeof($data) > 0) {
            $message = ['success' => 'Records returned', 'data' => $data];
        }
        else {
            $message = ['info' => 'No record found', 'data' => $data];
        }
        return response()->json($message, 200);
    }

    public function edit() {

    }

    public function update() {

    }

    public function delete() {

    }
}
