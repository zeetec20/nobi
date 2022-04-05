<?php

namespace App\Repositories\interface;

use Illuminate\Database\Eloquent\Collection;

interface TransactionRepositoryInterface {
    /**
     * @param function $flowTransaction
     *
     * @return bool
     */
    public function dbTransaction($flowTransaction);

    /**
     * @return void
     */
    public function dbRollback();

    /**
     * @param string $userId
     *
     * @return Collection
     */
    public function findBalanceWithUserId($userId);

    /**
     * @param string $trxId
     *
     * @return Collection
     */
    public function findTransactionWithTrxId($trxId);

    /**
     * @param int $userId
     * @param string $trxId
     * @param int $amount
     *
     * @return void
     */
    public function createTransaction($userId, $trxId, $amount);

    /**
     * @param int $userId
     * @param int $amountAvailable
     *
     * @return void
     */
    public function createBalance($userId, $amountAvailable);

    /**
     * @param int $id
     * @param int $amountAvailable
     *
     * @return void
     */
    public function updateAmountAvailableBalance($id, $amountAvailable);

    /**
     * @param int $userId
     * @param int $amountAvailable
     *
     * @return void
     */
    public function updateAmountAvailableBalanceWithUserId($userId, $amountAvailable);
}
