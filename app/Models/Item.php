<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $tables = 'items';
    
    /**
     * Get all of the OrderDetails for the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function OrderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'kode_item', 'kode_item');
    }

}
