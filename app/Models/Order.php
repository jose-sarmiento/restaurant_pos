<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "menu_id",
        "total_payment",
        "qty",
        "status",
        "type"
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function menu() {
        return $this->belongsTo(Menu::class);
    }
}
