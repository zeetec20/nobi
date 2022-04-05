<?php

namespace App\Repositories\repository;

use App\Models\Balance;
use App\Models\Transaction;
use App\Repositories\interface\TransactionRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TransactionRepository implements TransactionRepositoryInterface
{
    /**
     * @var Transaction
     */
    protected $transaction;


    /**
     * @var Balance
     */
    protected $balance;

    public function __construct(Transaction $transaction, Balance $balance) {
        $this->transaction = $transaction;
        $this->balance = $balance;
    }

    public function dbTransaction($flowTransaction)
    {
        try {
            DB::beginTransaction();
            $result = $flowTransaction();
            if ($result != null && $result['success'] == false) return $result;
            DB::commit();
            return ['success' => true];
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['success' => true, 'message' => 'Something wrong on system'];
        }
    }

    public function dbRollback()
    {
        return DB::rollBack();
    }

    public function findBalanceWithUserId($userId)
    {
        return $this->balance::where('user_id', $userId)->get();
    }

    public function findTransactionWithTrxId($trxId)
    {
        return $this->transaction::where('trx_id', $trxId)->get();
    }

    public function createTransaction($userId, $trxId, $amount) {
        return $this->transaction->create([
            'user_id' => $userId,
            'trx_id' => $trxId,
            'amount' => $amount,
        ]);
    }

    public function createBalance($userId, $amountAvailable)
    {
        return $this->balance->create([
            'user_id' => $userId,
            'amount_available' => $amountAvailable
        ]);
    }

    public function updateAmountAvailableBalance($id, $amountAvailable)
    {
        return $this->balance::where('id', $id)->update([
            'amount_available' => $amountAvailable
        ]);
    }

    public function updateAmountAvailableBalanceWithUserId($userId, $amountAvailable)
    {
        return $this->balance::where('user_id', $userId)->update([
            'amount_available' => $amountAvailable
        ]);
    }
}
