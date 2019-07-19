<?php
namespace App\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'store_id'     => ['nullable', 'integer'],
            'name'         => ['nullable', 'string', 'max:100'],
            'description'  => ['nullable', 'string', 'max:500'],
            'price'        => ['nullable', 'integer']
        ];
    }
    /*
    URLパラメータもバリデートできるようにする
    */
    protected function validationData()
    {
        return array_merge($this->all(), [
            'item_id' => $this->route('item_id'),
        ]);
    }
}
