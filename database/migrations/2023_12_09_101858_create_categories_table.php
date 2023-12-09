<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_categories_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_pid')->nullable(); // Для родительской категории
            $table->string('category_name');
            $table->string('category_photo')->nullable(); // Путь к фото
            $table->text('category_text')->nullable(); // Описание категории
            $table->timestamps(); // Дата создания и обновления записи
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
