<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create()
 * @method static find()
 */
class ShopList extends Model
{
    use softDeletes;
    protected $fillable = ['name'];
}
