<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'style_id',
        'size_id',
        'color_id',
        'quantity',
        'price',
        'item_description',
        'status',
    ];


    public function style()
    {
        return $this->belongsTo(Style::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
