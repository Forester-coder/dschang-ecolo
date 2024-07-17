<?php

namespace Database\Factories;

use App\Models\Quartier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quartier>
 *
 * Classe QuartierFactory
 *
 * Cette classe est utilisée pour générer des données fictives pour le modèle Quartier.
 */
class QuartierFactory extends Factory
{
    /**
     * Le nom du modèle associé à cette factory.
     *
     * @var string
     */
    protected $model = Quartier::class;

    /**
     * Définition des valeurs par défaut pour les attributs du modèle Quartier.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Génère un nom unique de ville comme nom de quartier
            'nom' => $this->faker->unique()->city(),

            // Génère un paragraphe de texte comme description
            'description' => $this->faker->paragraph(),
        ];
    }
}
