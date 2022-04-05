<?php

namespace App\Services;

use App\Repositories\interface\FactRepositoryInterface;

class FactServices
{
    protected $factRepository;

    public function __construct(FactRepositoryInterface $factRepository) {
        $this->factRepository = $factRepository;
    }

    public function randomChuckNorris()
    {
        try {
            $result = $this->factRepository->randomChuckNorris();
        } catch (\Throwable $th) {
            return [
                'error' => $th
            ];
        }
        return [
            'source' => 'Chuck Norris',
            'fact' => $result['value'],
            'length' => count(str_split($result['value']))
        ];
    }

    public function randomCatFacts()
    {
        try {
            $result = $this->factRepository->randomCatFacts();
        } catch (\Throwable $th) {
            return [
                'error' => $th
            ];
        }
        return [
            'source' => 'Cat Facts',
            'fact' => $result['fact'],
            'length' => $result['length']
        ];
    }

    public function randomFact()
    {
        return [$this->randomChuckNorris(), $this->randomCatFacts()][rand(0, 1)];
    }
}
