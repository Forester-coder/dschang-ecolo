<?php

/**
 * Migration pour créer la table quartier.
 *
 * Cette table stocke des informations sur les quartiers
 *
 * Champs :
 * - id : Identifiant unique du quartier.
 * - nom : Nom du quartier.
 * - description : Description ou historique du quartier.
 * - created_at : Timestamp de création.
 * - updated_at : Timestamp de mise à jour.
 *
 * @package App\Migrations
 * @see \App\Models\Quartier
 * @version 1.0
 * @date 2024-07-02
 */

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
        Schema::create('quartiers', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->longText('description');
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
        Schema::dropIfExists('quartiers');
    }
};
