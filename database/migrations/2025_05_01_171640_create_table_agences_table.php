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
        Schema::create('agences', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); 
            $table->string('nom');
            $table->string('email')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('telephone')->nullable();
            $table->text('Ville')->nullable();
            $table->json('gallery')->nullable();
            $table->string('site_web')->nullable();
            $table->json('regions')->nullable();
            $table->year('founding_year')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('logo_url')->nullable();
            $table->boolean('terms_accepted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_agences');
    }
};
