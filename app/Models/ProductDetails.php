<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * This model contains the products details as key-value pairs.
     */
    class ProductDetails extends Model {
        use HasFactory;
        use SoftDeletes;

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'product_id', // prooduct's ID
            'key',        // parameter's ID
            'value'       // parameter's value
        ];

        /**
         * The attributes that should be cast.
         *
         * @var string[]
         */
        protected $casts = [
            'deleted_at' => 'datetime' // record's deletion date-time
        ];
    }
