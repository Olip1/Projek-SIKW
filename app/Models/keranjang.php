<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    protected $table = 'keranjang';

    protected $fillable = ['id', 'product_id', 'qty'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
