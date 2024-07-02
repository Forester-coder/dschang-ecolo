<?php

/**
 * Migration pour créer la table type_abonnements.
 *
 * Cette table stocke des informations sur les types des abonnements.
 *
 * Champs :
 * - id : Identifiant unique du type d'abonnement.
 * - name : Nom du type d'abonnement.
 * - montant : montant du type d'abonnement.
 * - created_at : Timestamp de création.
 * - updated_at : Timestamp de mise à jour.
 *
 * @package App\Migrations
 * @see \App\Models\TypeAbonnement
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
        Schema::create('type_abonnements', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->float('montant');
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
        Schema::dropIfExists('type_abonnements');
    }
};
