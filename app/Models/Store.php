<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    protected $fillable = [
        'id',
        'name'
    ];


    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
