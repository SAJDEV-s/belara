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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('main_image')->nullable();
            $table->text('body');
            $table->string('metas');

            $table->foreignId('category_id')->constrained('blog_categories')->cascadeOnDelete();
            if (config('belara.author')){
                $table->foreignId('author')->constrained('users','id')->cascadeOnDelete();
            }else{
                $table->string('author');
            }

            $table->boolean('is_published')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
