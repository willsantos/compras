<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create()
 * @method static where(string $column_table, string $operator, $item)
 *
 */
class ListItem extends Model
{
    protected $fillable = [
        'list_id',
        'item_id',
        'status',
        'priority'
    ];

    public function findOrCreate($list, $item, $priority): bool
    {
        $obj = static::where('item_id', '=', $item)->where('list_id', '=', $list)->first();

        if (is_null($obj)) {
            $obj = static::create([
                'list_id' => $list,
                'item_id' => $item,
                'status' => 0,
                'priority' => $priority
            ]);

            return true;
        }

        return false;
    }


}
