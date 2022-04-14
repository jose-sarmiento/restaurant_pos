<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image",
        "price",
        "qty_available"
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
