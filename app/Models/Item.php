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

    public function images()
    {
        return $this->hasMany(ItemImage::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($model) {
            foreach ($model->images()->get() as $child) {
                $child->delete();
            }
        });
    }


}
