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


    public function searchItems(array $params)
    {
        return $this->item_repository->searchItems($params);
    }


    public function getItemById(string $item_id)
    {
        return $this->item_repository->getItemById($item_id);
    }


    public function createCase(array $params)
    {
        //image_urlパラメータの分離
        $image_url = $params["image_url"];
        $image_params = ["url" => $image_url];
        unset($params['image_url']);

        $case_params = array_merge($params, [
            //store_idあとで修正
            'store_id'  => 1
        ]);

        var_dump($image_params);
        var_dump($case_params);

        //商品データの作成
        $case_id = $this->item_repository->createCase($case_params, $image_params);

        //できたケースを返す
        $res = $this->item_repository->getItemById($case_id);
        return $res;
    }


    public function updateItem(int $item_id, array $params)
    {
        $this->item_repository->updateItem($item_id, $params);
        $res = $this->item_repository->getItemById($item_id);
        return $res;
    }


    public function deleteItem(int $item_id){
        $res = $this->item_repository->deleteItem($item_id);
        return $res;

    }

}
