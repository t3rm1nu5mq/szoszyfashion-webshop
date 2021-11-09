<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'parent'];

    protected $dates = ['deleted_at'];

    public function details(): HasMany {
        return $this->hasMany(ProductDetails::class, 'product_id', 'id');
    }
}
