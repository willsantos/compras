<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create()
 * @method static find()
 */
class ShopList extends Model
{
    use softDeletes;

    protected $fillable = ['name'];


    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'list_items', 'list_id', 'item_id');
    }
}
