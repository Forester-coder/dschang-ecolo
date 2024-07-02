<?php

/**
 * Migration pour créer la table post_dechets.
 *
 * Cette table stocke des informations sur les Posts de Dechets
 *
 * Champs :
 * - id : Identifiant unique du quartier.
 * - contenu : contenu du post de dechet
 * - user_id identifiant de l'utilisateir qui a poster le dechet
 * - created_at : Timestamp de création.
 * - updated_at : Timestamp de mise à jour.
 *
 * @package App\Migrations
 * @see \App\Models\PostDechet
 * @version 1.0
 * @date 2024-07-02
 */

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
        Schema::create('post_dechets', function (Blueprint $table) {
            $table->id();
            $table->longText('contenu');
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
        Schema::dropIfExists('post_dechets');
    }
};
