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
            $table->unsignedBigInteger('agence_id');
            $table->unsignedBigInteger('destination_depart_id');
            $table->unsignedBigInteger('destination_arrive_id');
            $table->date('date_depart');
            $table->time('heure_depart');
            $table->decimal('montant', 10, 2);
            $table->integer('nbre_place');
            $table->enum('statut', ['active', 'inactive'])->default('active');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('agence_id')->references('id')->on('agences')->onDelete('cascade');
            $table->foreign('destination_depart_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->foreign('destination_arrive_id')->references('id')->on('destinations')->onDelete('cascade');
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
