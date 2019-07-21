<?php
namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;

class ItemEntity implements Arrayable
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $store_id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var int
     */
    public $price;

    /**
     * @var BaseEntityCollection[ItemImageEntity]
     */
    public $images;

    /*
    classを配列に変換
    */
    public function toArray()
    {
        return [
            'id'          => $this->id,
            'store_id'    => $this->store_id,
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => $this->price,
            'images'      => $this->images ? $this->images->toArray() : []
        ];
    }

}
