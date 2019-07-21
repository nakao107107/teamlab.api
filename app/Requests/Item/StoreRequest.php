<?php

namespace App\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
//            'store_id'     => ['required', 'integer'],
            'name'         => ['required', 'string', 'max:100'],
            'description'  => ['required', 'string', 'max:500'],
            'price'        => ['required', 'integer'],
            'image_url'    => ['required', 'string']
        ];
    }
}
