<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * This model contains the categories data.
     */
    class Category extends Model {
        use HasFactory;
        use SoftDeletes;

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'name',     // category's name
            'image',    // category's cover image
            'is_active' // category is active
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
