<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'invoice_number',
        'total',
        'paid',
        'change',
    ];

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}