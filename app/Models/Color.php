<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'color_code',
        'color_name',
        'color_description',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
