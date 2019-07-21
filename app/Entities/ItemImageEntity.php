<?php
namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;

class ItemImageEntity implements Arrayable
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $item_id;

    /**
     * @var string
     */
    public $url;

    /*
    classを配列に変換
    */
    public function toArray()
    {
        return [
            'url' => $this->url
        ];
    }

}
