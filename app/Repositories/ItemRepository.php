<?php
namespace App\Repositories;

use App\Models\Item;
use App\Entities\ItemEntity;
use App\Utilities\EntityMapper;

class ItemRepository
{

    public function __construct(
        Item $item
    ){
        $this->item       = $item;
    }

    private function _getRelation()
    {
        return [
            'store'
        ];
    }

    /**
     * 商品検索を行って、ヒットしたIDとヒット件数を返す
     *
     * @param array $params クエリ
     * @return Items
     */
    public function searchItems(array $params = [])
    {

        $model = $this->item::with($this->_getRelation());

        $data = $model
            ->get()
            ->toArray();

        return EntityMapper::collection($data, ItemEntity::class);

    }


}
