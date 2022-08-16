<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_subcategory_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('code');
            $table->integer('quantity');
            $table->string('tags');
            $table->string('size')->nullable();
            $table->string('color');
            $table->decimal('selling_price', 8, 2);
            $table->decimal('discount_price', 8, 2)->nullable();
            $table->string('short_description');
            $table->text('long_description');
            $table->string('thumbnail');
            $table->tinyInteger('hot_deals')->nullable();
            $table->tinyInteger('featured')->nullable();
            $table->tinyInteger('special_offer')->nullable();
            $table->tinyInteger('special_deal')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }
}
