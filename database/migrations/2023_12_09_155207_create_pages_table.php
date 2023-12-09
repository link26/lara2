<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Заголовок страницы
            $table->string('slug')->unique(); // Уникальный slug страницы для ЧПУ
            $table->text('content'); // Содержимое страницы
            $table->unsignedBigInteger('parent_id')->nullable(); // Теперь может быть null
            $table->unsignedInteger('menu_type')->default(1); // Тип меню
            $table->integer('order'); // Порядок сортировки, без значения по умолчанию
            $table->boolean('visible')->default(true); // Видимость страницы
            $table->timestamps(); // Метки времени создания и обновления

            // Внешний ключ для ссылки на родительскую страницу
            $table->foreign('parent_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
