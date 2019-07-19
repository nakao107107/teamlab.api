<?php
namespace App\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'item_id' => ['required', 'integer'],
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
