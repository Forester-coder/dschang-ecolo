<?php

/**
 * Migration pour créer la table abonnements.
 *
 * Cette table stocke des informations sur les abonnements
 *
 * Champs :
 * - id : Identifiant unique de l'abonnement.
 * - date_debut : date de debut de l'abonnement
 * - date_fin : date de fin de l'abonnement
 * - type_abonnement_id : identifiant du type d'abonnement
 * - moyen_paiement_id : identifiant du moyen de paiement
 * - user_id : identifiant de l'utilisateur
 * - created_at : Timestamp de création.
 * - updated_at : Timestamp de mise à jour.
 *
 * @package App\Migrations
 * @see \App\Models\Abonnement
 * @version 1.0
 * @date 2024-07-02
 */

use App\Models\MoyenPaiement;
use App\Models\TypeAbonnement;
use App\Models\User;
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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->boolean('etat');
            $table->foreignIdFor(TypeAbonnement::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(MoyenPaiement::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('abonnements');
    }
};
