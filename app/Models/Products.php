<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'key',
        'category',
        'compound',
        'function',
        'healingProperties',
        'filters',
        'lang'
    ];
}
