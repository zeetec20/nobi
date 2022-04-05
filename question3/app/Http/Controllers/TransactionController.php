<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopUpBalanceRequest;
use App\Http\Requests\TransactionRequest;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @var TransactionService
     */
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function transaction(TransactionRequest $request)
    {
        $data = $request->all(['trx_id', 'amount']);
        sleep(30);
        $result = $this->transactionService->createTransaction(...$data);
        return response()->json($result);
    }

    public function topUpBalance(TopUpBalanceRequest $request)
    {
        $amount = $request->get('amount_available');
        $result = $this->transactionService->topUpBalance($amount);
        return response()->json($result);
    }

    public function balance()
    {
        return response()->json($this->transactionService->findBalance());
    }
}
