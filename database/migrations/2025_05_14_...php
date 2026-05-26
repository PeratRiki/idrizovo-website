<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('handmade_items', function (Blueprint $table) {
            $table->id();

            // Категорија (iglaikonec, rezba, boja, grncarstvo)
            $table->string('category');

            // Наслов на секцијата
            $table->string('title');

            // Опис / текст
            $table->text('description');

            // Главна слика (патека)
            $table->string('image_main')->nullable();

            // До 4 дополнителни слики (JSON низа)
            $table->json('images_extra')->nullable();

            // Линк за "Види повеќе"
            $table->string('link_url')->nullable();

            // Цитат (за quote картичките)
            $table->text('quote')->nullable();

            // Редослед на прикажување
            $table->integer('sort_order')->default(0);

            // Прикажи/скриј
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });

        // Посебна табела за цитатите (quote картичките на врвот)
        Schema::create('handmade_quotes', function (Blueprint $table) {
            $table->id();
            $table->text('quote');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('handmade_items');
        Schema::dropIfExists('handmade_quotes');
    }
};