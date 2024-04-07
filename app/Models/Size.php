<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'size_code',
        'size_name',
        'size_description',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
