<?php
namespace App\Entities;

class ItemEntity
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
            'price'       => $this->price
        ];
    }

}
