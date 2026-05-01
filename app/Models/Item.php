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

    /**
     * Relasi: Item ke Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Accessor: gabungan item_code + item_name
     */
    public function getFullNameAttribute()
    {
        return $this->item_code . ' - ' . $this->item_name;
    }

    /**
     * Mutator: item_code otomatis uppercase
     */
    public function setItemCodeAttribute($value)
    {
        $this->attributes['item_code'] = strtoupper($value);
    }
}