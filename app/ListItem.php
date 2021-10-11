<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create()
 * @method static where(string $string, string $string1, $list, string $string2, string $string3, string $string4, $item)
 */
class ListItem extends Model
{
    protected $fillable = [
        'list_id',
        'item_id',
        'status',
        'priority'
    ];

    public function findOrCreate($list, $item): ListItem
    {
        $obj = static::where('item_id', '=', $list, 'AND', 'list_id', '=', $item)->first();


        return $obj ?: new static;
    }
}
