<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreatePropertiesTable extends Migration {
		public function up() {
			Schema::create('properties', function (Blueprint $table) {
				$table->id();
                $table->tinyText('name');
                $table->boolean('is_available')->default(true);
                $table->double('min_value')->nullable();
                $table->double('max_value')->nullable();
                $table->longText('available_values')->nullable();
                $table->integer('value_type');
                $table->boolean('is_filterable')->default(true);
                $table->boolean('is_required')->default(true);
				$table->timestamps();
                $table->softDeletes();
			});
		}

		public function down() {
			Schema::dropIfExists('properties');
		}
	}
