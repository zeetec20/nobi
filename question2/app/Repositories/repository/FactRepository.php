<?php

namespace App\Repositories\repository;

use App\Repositories\interface\FactRepositoryInterface;
use Illuminate\Support\Facades\Http;

class FactRepository implements FactRepositoryInterface
{
    public function randomChuckNorris()
    {
        return Http::get(env('API_URL_CHUCK_NORRIS').'/jokes/random')->json();
    }

    public function randomDogFacts()
    {
        return Http::get(env('API_URL_DOG_FACTS'))->json();
    }

    public function randomCatFacts()
    {
        return Http::get(env('API_URL_CAT_FACTS').'/fact')->json();
    }
}
