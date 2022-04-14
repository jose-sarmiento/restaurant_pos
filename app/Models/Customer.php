<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ["firstname", "lastname", "image", "address"];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
