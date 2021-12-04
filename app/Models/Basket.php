<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * This model contains the baskets.
     */
    class Basket extends Model {
        use HasFactory;
        use SoftDeletes;

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'user_id',          // customer's ID
            'coupon_id',        // used coupon's ID (if exists)
            'delivery_method',  // selected delivery method (if exists)
            'payment_method'    // selected payment method (if exists)
        ];


        /**
         * Get basket items.
         *
         * @return HasMany
         */
        public function items(): HasMany {
            return $this->hasMany(BasketItem::class, 'basket_id', 'id');
        }
    }
