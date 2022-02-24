<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $tables = 'orders';
    protected $primary = 'id';
    protected $guarded = [];

    /**
     * Get all of the Detail for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Detail(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    /**
     * Get Amount For Data Diagram
     *
     * @return void
     */
    public function GetAmount()
    {
        $total_bayar = DB::table('orders')
                        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'), DB::raw('sum(total_bayar) as tobar'))
                        ->groupBy('date')
                        ->get();
        return json_encode($total_bayar->pluck('tobar'), JSON_NUMERIC_CHECK);
    }
    
    /**
     * Get Item For Data Diagram
     *
     * @return void
     */
    public function GetItem()
    {
        $total_bayar = DB::table('orders')
                        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'), DB::raw('sum(total_bayar) as tobar'))
                        ->groupBy('date')
                        ->get();
        return json_encode($total_bayar->pluck('tobar'), JSON_NUMERIC_CHECK);
    }

    
}
