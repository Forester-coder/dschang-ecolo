<?php

/**
 * Migration pour créer la table user_notifications.
 *
 * Cette table stocke des informations sur les les utilisateurs et leur notifications
 *
 * Champs :
 * - id : Identifiant unique du quartier.
 * - user_id : identifiant de l'utilisateur.
 * - notification_id : identifiant de la notification.
 * - created_at : Timestamp de création.
 * - updated_at : Timestamp de mise à jour.
 *
 * @package App\Migrations
 * @see \App\Models\User
 * @see \App\Models\Notification
 * @version 1.0
 * @date 2024-07-02
 */

use App\Models\Notification;
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
        Schema::create('user_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Notification::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('user_notification');
    }
};
