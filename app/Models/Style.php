<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;

    protected $fillable = [
        'style_code',
        'style_name',
        'style_description',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
