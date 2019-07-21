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
            'images'
        ];
    }


    public function searchItems(array $params = [])
    {

        $model = $this->item::with($this->_getRelation());

        //storeが指定されている場合、storeで絞り込み
        if(isset($params['store_id'])){
            $model->where('store_id', $params['store_id']);
        }

        $data = $model
            ->get()
            ->toArray();

        return EntityMapper::collection($data, ItemEntity::class);

    }


    public function getItemById($item_id)
    {

        $model = $this->item::with($this->_getRelation());

        $data = $model
            ->where('id', $item_id)
            ->firstOrFail()
            ->toArray();

        return EntityMapper::map($data, ItemEntity::class);

    }


    public function createCase(array $params, array $image_params)
    {

        $model = $this->item::create($params);
        $model->images()->create($image_params);
        return $model->id;
    }


    public function updateItem(int $item_id, array $params)
    {
        $model = $this->item::where('id', $item_id);
        $model = $model->firstOrFail();
        $model->fill($params)->save();
        return true;
    }


    public function deleteItem(int $item_id){
        $model = $this->item::where('id', $item_id);
        $model = $model->firstOrFail();
        return $model->delete();
    }
}
