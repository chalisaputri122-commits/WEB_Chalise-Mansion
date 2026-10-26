<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'nama',
        'category_id',
        'brand',
        'size',
        'color',
        'stock',
        'purchase_price',
        'selling_price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
} // <--- TAMBAHKAN KURUNG KURAWAL INI DI PALING BAWAH