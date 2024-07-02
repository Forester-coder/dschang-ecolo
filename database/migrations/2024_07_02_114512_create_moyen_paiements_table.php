<?php


/**
 * Migration pour créer la table moyen_paiements.
 *
 * Cette table stocke des informations sur les moyens de paiements
 *
 * Champs :
 * - id : Identifiant unique du moyen de paiement.
 * - nom : Nom du moyen de paiement.
 * - description : Description ou historique du moyen de paiement.
 * - created_at : Timestamp de création.
 * - updated_at : Timestamp de mise à jour.
 *
 * @package App\Migrations
 * @see \App\Models\MoyenPaiement
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
        Schema::create('moyen_paiements', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->string('description');
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
        Schema::dropIfExists('moyen_paiements');
    }
};
