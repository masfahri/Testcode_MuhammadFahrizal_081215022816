<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderTemp extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'order_id',
    //     'kode_item',
    //     'qty',
    //     'sub_total',
    // ];
    protected $guarded = [];

    /**
     * Get the Item associated with the OrdeTemp
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Item(): HasOne
    {
        return $this->hasOne(Item::class, 'kode_item', 'kode_item');
    }
}
