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
        Schema::table('agences', function (Blueprint $table) {
            $table->string('agency_photo')->nullable()->after('agency_type'); // Colonne pour la photo
            $table->string('agency_logo')->nullable()->after('agency_photo'); // Colonne pour le logo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agences', function (Blueprint $table) {
            $table->dropColumn('agency_photo');
            $table->dropColumn('agency_logo');
        });
    }
};
