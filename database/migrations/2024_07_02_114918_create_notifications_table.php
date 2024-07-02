<?php

/**
 * Migration pour créer la table notifications.
 *
 * Cette table stocke des informations sur les notifications
 *
 * Champs :
 * - id : Identifiant unique du message.
 * - message : message a envoyer.
 * - created_at : Timestamp de création.
 * - updated_at : Timestamp de mise à jour.
 *
 * @package App\Migrations
 * @see \App\Models\Notification
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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->longText('message')->unique();
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
        Schema::dropIfExists('notifications');
    }
};
