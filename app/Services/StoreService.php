<?php

namespace App\Services;

use App\Repositories\StoreRepository;

class StoreService
{

    private $store_repository;

    public function __construct(
        StoreRepository $store_repository
    )
    {
        $this->store_repository = $store_repository;
    }


    public function searchStores()
    {
        return $this->store_repository->searchStores();
    }

}
