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

        
        Schema::create('categories_translation', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->longText('description');
            // Foreign key to the main model
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->onDelete('cascade');
            
            
            $table->unique(['category_id', 'locale']);
            // fields you want to translate
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_translation');
    }
};
