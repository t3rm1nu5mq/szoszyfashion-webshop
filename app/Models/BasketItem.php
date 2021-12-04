<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasOne;
    use Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * This model contains the basket's items.
     */
    class BasketItem extends Model {
        use HasFactory;
        use SoftDeletes;

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'basket_id',
            'product_id',
            'count'
        ];

        /**
         * Get products from basket.
         *
         * @return HasOne
         */
        public function product(): HasOne {
            return $this->hasOne(Product::class, 'id', 'product_id');
        }
    }
