<?php

namespace App\Services;

use App\Repositories\ItemRepository;

class ItemService
{

    private $item_repository;
    public function __construct(
        ItemRepository    $item_repository
    ){
        $this->item_repository    = $item_repository;
    }

    /**
     * 在庫を検索する
     *
     * @param int $store_id 店舗ID
     * @param array $params クエリ
     * @return BaseEntityCollection[ItemEntity_sm]
     */
    public function searchItems(array $params)
    {
        return $this->item_repository->searchItems($params);
    }
}
