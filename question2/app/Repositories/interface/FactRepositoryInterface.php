<?php

namespace App\Repositories\interface;

interface FactRepositoryInterface {
    /**
     * @return mixed
     */
    public function randomChuckNorris();

    /**
     * @return mixed
     */
    public function randomDogFacts();

    /**
     * @return mixed
     */
    public function randomCatFacts();
}
