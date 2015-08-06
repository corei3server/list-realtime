<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 * @package App
 */
class Item extends Model {
    protected $fillable = [
        'title',
        'is_editing',
    ];
}
