<?php

namespace App\Services;

use App\Helper\Utils;
use App\Models\Balance;
use App\Models\Transaction;
use App\Repositories\interface\TransactionRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    /**
     * @var TransactionRepositoryInterface
     */
    protected $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function createTransaction($trx_id, $amount)
    {
        $amount = Utils::numberTo6Digit($amount);
        $transaction = true;
        if ($amount <= 0.00000001) $transaction = false;
        $balance = $this->transactionRepository->findBalanceWithUserId(Auth::user()->id)->first();
        $transaction = $this->transactionRepository->dbTransaction(function () use ($trx_id, $amount, $balance) {
            if (
                $this->transactionRepository->findTransactionWithTrxId($trx_id)->count() != 0
            ) {
                $this->transactionRepository->dbRollback();
                return ['success' => false, 'message' => 'Transaction with input trx id already exist'];
            }
            if ($balance->amount_available > $amount) {
                $balance->amount_available = $balance->amount_available - $amount;
                $balance->save();
            } else {
                $this->transactionRepository->dbRollback();
                return ['success' => false, 'message' => 'Your amount not enough for transaction'];
            }
            $this->transactionRepository->createTransaction(Auth::user()->id, $trx_id, $amount);
        });
        if ($transaction['success']) {
            return [
                'success' => true,
                'transaction' => [
                    'trx_id' => $trx_id,
                    'amount' => $amount,
                    'amount_available' => $balance->amount_available
                ]
            ];
        } else {
            if ($balance == null) $transaction['message'] = "You don't have balance";

            return  [
                'success' => false,
                'message' => $transaction['message'],
            ];
        }
    }

    public function findBalance()
    {
        return $this->transactionRepository->findBalanceWithUserId(Auth::user()->id)->first();
    }

    public function topUpBalance($amountAvailable)
    {
        $user = Auth::user();
        try {
            $balance = $this->transactionRepository->findBalanceWithUserId($user->id);
            if ($balance->count() == 0) {
                $this->transactionRepository->createBalance($user->id, $amountAvailable);
            } else {
                $this->transactionRepository->updateAmountAvailableBalanceWithUserId($user->id, $balance->first()->amount_available + $amountAvailable);
            }
            return [
                'success' => true
            ];
        } catch (\Throwable $err) {
            return [
                'success' => false,
                'message' => $err
            ];
        }
    }
}
