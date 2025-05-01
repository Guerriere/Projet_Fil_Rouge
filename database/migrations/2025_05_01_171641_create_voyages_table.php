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
        Schema::create('voyages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agence_id')->constrained()->onDelete('cascade');
            $table->foreignId('destination_id')->constrained()->onDelete('cascade');
            $table->string('titre');
            $table->text('description');
            $table->date('date_depart');
            $table->date('date_retour');
            $table->string('ville_depart');
            $table->string('quartier_depart')->nullable();
            $table->string('adresse_depart')->nullable();
            $table->decimal('prix', 10, 2);
            $table->integer('places_disponibles');
            $table->text('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voyages');
    }
};
