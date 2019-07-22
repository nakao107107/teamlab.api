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


    protected static function boot()
    {
        parent::boot();
        static::deleting(function($model) {
            foreach ($model->items()->get() as $child) {
                $child->delete();
            }
        });
    }
}
