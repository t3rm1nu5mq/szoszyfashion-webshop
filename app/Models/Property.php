<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Property extends Model {

        use SoftDeletes;

        protected $fillable = [
            'name',                // property's name
            'is_available',        // property is available
            'min_value',           // property's min value
            'max_value',           // property's max value
            'available_values',    // property's available values (in select)
            'value_type',          // property's value type (text, number, selectable)
            'is_filterable',       // property is filterable
            'is_required'          // property is required
        ];

        protected $casts = [
            'deleted_at' => 'datetime'
        ];
	}
