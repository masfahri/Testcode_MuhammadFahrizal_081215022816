<?php

namespace App\Models;

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
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }
}
