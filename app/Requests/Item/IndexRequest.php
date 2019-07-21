<?php
namespace App\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules()
    {
        return [
            'store_id' => ['nullable', 'integer'],
        ];
    }
}
