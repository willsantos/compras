<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create()
 */
class ListItem extends Model
{
    protected $fillable = [
        'list_id',
        'item_id',
        'status',
        'priority'
    ];
}
