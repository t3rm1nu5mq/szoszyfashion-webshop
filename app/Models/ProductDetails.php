<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetails extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['product_id', 'key', 'value'];

    protected $dates = ['deleted_at'];
}
