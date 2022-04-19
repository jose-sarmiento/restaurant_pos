<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Uuids;
use App\Models\Customer;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Uuids;
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

    public function scopeByDate($query, $date)
    {
        if ($date === "day") {
            return $query->whereDate('created_at', Carbon::today());
        } else if ($date === "week") {
            return $query->whereBetween("created_at", [
                       Carbon::now()->startOfWeek()->format('Y-m-d'), 
                       Carbon::now()->endOfWeek()->format('Y-m-d')
                    ]);
        } else if ($date === "month") {
            return $query->whereMonth('created_at', Carbon::now()->month);
        } else if ($date === "year") {
            return $query->whereYear('created_at', Carbon::now()->year);
        } else {
            return $query;
        }
    }

    public function scopeThisDay($query)
    {
        return $query->whereDate('created_at', now()->today());
    }
}
