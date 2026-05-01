<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'item_code',
        'item_name',
        'image',
        'category_id',
        'stock',
        'brand',
        'description',
    ];

    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    
    public function getFullNameAttribute()
    {
        return $this->item_code . ' - ' . $this->item_name;
    }

   
    public function setItemCodeAttribute($value)
    {
        $this->attributes['item_code'] = strtoupper($value);
    }
}