<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create(array $all)
 * @method static find(mixed $id)
 * @method static where(string $table_column, string $operator, $name)
 */
class Item extends Model
{

    protected $fillable = ['name'];


    public function shopLists(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'list_items', 'item_id', 'list_id')
            ->withTimestamps()
            ->withPivot(['status', 'priority'])
            ->as('list_items');
    }

    public static function findOrCreate($name): Item
    {
        $obj = static::where('name', '=', $name)->first();

        if (is_null($obj)) {
            $obj = static::create(['name' => $name]);
        }
        return $obj ?: new static;
    }
}
