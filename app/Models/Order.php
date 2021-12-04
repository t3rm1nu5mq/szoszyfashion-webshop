<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\HasOne;
    use Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * This model contains the orders.
     */
    class Order extends Model {
        use HasFactory;
        use SoftDeletes;

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'user_id', // customer's user ID
            'amount',  // order's amount
            'status'   // order's actual status
        ];

        /**
         * The attributes that should be cast.
         *
         * @var string[]
         */
        protected $casts = [
            'deleted_at' => 'datetime' // record's deletion date-time
        ];

        /**
         * Get all the items for the Order
         *
         * @return HasMany
         */
        public function items(): HasMany
        {
            return $this->hasMany(OrderItem::class, 'order_id', 'id');
        }

        /**
         * Get information for the Order
         *
         * @return HasOne
         */
        public function details(): HasOne {
            return $this->hasOne(OrderInfo::class, 'order_id', 'id');
        }
    }
