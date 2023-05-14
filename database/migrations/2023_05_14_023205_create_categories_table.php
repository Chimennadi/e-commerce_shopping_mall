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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer("parent_id");
            $table->integer("section_id");
            $table->string("category_name");
            $table->string("category_image");
            $table->float("category_discount");
            $table->text("description");
            $table->string("url");
            $table->string("meta_title");
            $table->string("meta_description");
            $table->string("meta_keywords");
            $table->tinyInteger("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
