<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    protected $fillable = [
        'id',
        'item_id',
        'url'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
