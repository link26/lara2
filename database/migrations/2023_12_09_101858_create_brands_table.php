<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_brands_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_category_id'); // ID категории
            $table->string('brand_name'); // Название бренда
            $table->string('brand_photo')->nullable(); // Путь к фото
            $table->string('brand_pdf')->nullable(); // Путь к PDF
            $table->integer('brand_star1')->nullable(); // Оценки
            $table->integer('brand_star2')->nullable();
            $table->integer('brand_star3')->nullable();
            $table->text('brand_text_napr')->nullable(); // Описание бренда
            $table->timestamps();

            // Внешний ключ для связи с таблицей categories
            $table->foreign('brand_category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
