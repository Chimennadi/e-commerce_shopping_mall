<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer("section_id");
            $table->integer("category_id");
            $table->integer("brand_id");
            $table->integer("vendor_id");
            $table->string("admin_type");
            $table->string("product_name");
            $table->string("product_code");
            $table->string("product_color");
            $table->string("product_price");
            $table->string("product_discount");
            $table->string("product_weight");
            $table->string("product_image");
            $table->string("product_video");
            $table->string("description");
            $table->string("meta_title");
            $table->string("meta_description");
            $table->string("meta_keywords");
            $table->string("is_featured");
            $table->tinyInteger("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
