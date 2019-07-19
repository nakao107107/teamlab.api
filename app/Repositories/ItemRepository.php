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

    /**
     * idから商品を取得する
     * @param int $item_id 在庫ID
     * @return Items
     */
    public function getItemById($item_id)
    {

        $model = $this->item::with($this->_getRelation());

        $data = $model
            ->where('id', $item_id)
            ->firstOrFail()
            ->toArray();

        return EntityMapper::map($data, ItemEntity::class);

    }

    /**
     * 商品データの新規挿入をする
     * 新規作成されたidを返す
     *
     * @param array $params クエリ
     * @return int
     */
    public function createCase(array $params)
    {

        $model = $this->item::create($params);
        return $model->id;
    }

    /**
     * 在庫情報の更新
     *
     * @param int $item_id 在庫ID
     * @param array $params クエリ
     * @return bool
     */
    public function updateItem(int $item_id, array $params)
    {
        $model = $this->item::where('id', $item_id);
        $model = $model->firstOrFail();
        $model->fill($params)->save();
        return true;
    }

    /**
     * 在庫情報の削除
     *
     * @param int $item_id 在庫ID
     * @return bool
     */
    public function deleteItem(int $item_id){
        $model = $this->item::where('id', $item_id);
        $model = $model->firstOrFail();
        return $model->delete();
    }





}
