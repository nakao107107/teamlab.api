<?php

namespace App\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
}
