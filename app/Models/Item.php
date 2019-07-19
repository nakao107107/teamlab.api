<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'id',
        'store_id',
        'name',
        'description',
        'price'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
