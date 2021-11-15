<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * This model contains the products.
     */
    class Product extends Model {
        use HasFactory;
        use SoftDeletes;

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'name',   // product's name
            'parent'  // product's parent's ID (if exists)
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
         * Get product's details from ProductDetails
         *
         * @return HasMany
         */
        public function details(): HasMany {
            return $this->hasMany(ProductDetails::class, 'product_id', 'id');
        }
    }
