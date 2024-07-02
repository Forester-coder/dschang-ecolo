<?php

/**
 * Migration pour créer la table depotoirs.
 *
 * Cette table stocke des informations sur les depotoirs
 *
 * Champs :
 * - id : Identifiant unique du depotoir.
 * - latitude : Latitude du depotoir en degrés décimaux.
 * - longitude : Longitude du depotoir en degrés décimaux.
 * - quartier_id : Identifiant unique du quartier dans le quel se trouve le depotoir.
 * - created_at : Timestamp de création.
 * - updated_at : Timestamp de mise à jour.
 *
 * @package App\Migrations
 * @see \App\Models\Depotoir
 * @version 1.0
 * @date 2024-07-02
 */

use App\Models\Quartier;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('depotoirs', function (Blueprint $table) {
            $table->id();
            $table->string('latitude');
            $table->string('longitude');
            $table->foreignIdFor(Quartier::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Annule les migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('depotoirs');
    }
};
