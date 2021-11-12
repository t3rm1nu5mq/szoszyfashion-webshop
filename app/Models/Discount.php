<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * This model contains the discounts data.
     */
    class Discount extends Model {
        use HasFactory;
        use SoftDeletes;

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'name',        // discount's inner name
            'title',       // discount's displayed name
            'description', // discount's description
            'type',        // discount's type
            'value',       // discount's value
            'from',        // discount's beginning date-time
            'to'           // discount's ending date-time
        ];

        /**
         * The attributes that should be cast.
         *
         * @var string[]
         */
        protected $casts = [
            'deleted_at' => 'datetime', // record's deletion date-time
            'from'       => 'datetime', // discount's beginning date-time
            'to'         => 'datetime'  // discount's ending date-time
        ];
    }
