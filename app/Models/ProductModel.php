<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'brand',
        'status',
        'price'
    ];

    public function sales (): HasMany
    {
        return $this->hasMany(SaleModel::class);
    }
}
