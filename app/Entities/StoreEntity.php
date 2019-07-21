<?php
namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;

class StoreEntity implements Arrayable
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /*
    classを配列に変換
    */
    public function toArray()
    {
        return [
            'id'   => $this->id,
            'name' => $this->name
        ];
    }

}
