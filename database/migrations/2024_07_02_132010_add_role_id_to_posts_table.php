<?php

/**
 * Migration pour mettre a jour les champs de  la table users.
 *
 * Cette table stocke des informations sur les users
 *
 * Champs :
 * - role_id : identifiant unique du role de l'utilisateur.
 * - quartier_id : identifiant unique du quartier de l'utilisateur.

 *
 * @package App\Migrations
 * @see \App\Models\User
 * @version 1.0
 * @date 2024-07-02
 */

use App\Models\Quartier;
use App\Models\Role;
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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(Role::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Quartier::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Annule les migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeignIdFor(Role::class);
            $table->dropForeignIdFor(Quartier::class);
        });
    }
};
