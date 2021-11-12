<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * This model contains the orders.
     */
    class Order extends Model {
        use HasFactory;
        use SoftDeletes;

        /**
         * @var string[]
         */
        protected $fillable = [
            'user_id', // customer's user ID
            'amount',  // order's amount
            'status'   // order's actual status
        ];

        /**
         * @var string[]
         */
        protected $casts = [
            'deleted_at' => 'datetime' // record's deletion date-time
        ];
    }
