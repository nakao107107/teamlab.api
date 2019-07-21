<?php
namespace App\Repositories;

use App\Models\Store;
use App\Entities\StoreEntity;
use App\Utilities\EntityMapper;

class StoreRepository
{

    public function __construct(
        Store $store
    )
    {
        $this->store = $store;
    }

    public function searchStores()
    {

        $model = $this->store;

        $data = $model
            ->get()
            ->toArray();

        return EntityMapper::collection($data, StoreEntity::class);

    }



}
