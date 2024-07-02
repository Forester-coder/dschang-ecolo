<?php

/**
 * Migration pour créer la table roles.
 *
 * Cette table stocke des informations sur les roles
 *
 * Champs :
 * - id : Identifiant unique du role.
 * - nom : Nom du role.
 * - description : Description ou historique du role.
 * - created_at : Timestamp de création.
 * - updated_at : Timestamp de mise à jour.
 *
 * @package App\Migrations
 * @see \App\Models\Role
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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->text('description');
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
        Schema::dropIfExists('roles');
    }
};
