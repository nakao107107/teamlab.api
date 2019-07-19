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

    /**
     * idから在庫を取得する
     * @return BaseEntityCollection[ItemEntity_sm]
     */
    public function getItemById(string $item_id)
    {
        return $this->item_repository->getItemById($item_id);
    }


    /**
     * 商品データを作成する
     *
     * @param array $params クエリ
     * @return BasCaseEntity
     * @throws
     */
    public function createCase(array $params)
    {
        //作成するケースのパラメータを決定
        $case_params = array_merge($params, [
            //store_idあとで修正
            'store_id'  => 1
        ]);

        //ケースの作成
        $case_id = $this->item_repository->createCase($case_params);

        //できたケースを返す
        $res = $this->item_repository->getItemById($case_id);
        return $res;
    }
}
