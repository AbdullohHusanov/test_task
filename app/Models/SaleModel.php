<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaleModel extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $fillable = [
        'count',
        'price',
        'month',
        'year'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductModel::class, 'product_id','id');
    }
}
