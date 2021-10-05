<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create(array $all)
 * @method static find(mixed $id)
 */
class Item extends Model
{

    protected $fillable = ['name'];


    public function shopLists(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'list_items', 'item_id', 'list_id');
    }
}
