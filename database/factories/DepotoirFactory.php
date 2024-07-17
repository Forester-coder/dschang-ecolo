<?php

namespace Database\Factories;

use App\Models\Depotoir;
use App\Models\Quartier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depotoir>
 * Classe DepotoirFactory
 *
 * Factory pour générer des données fictives pour le modèle Depotoir.
 */
class DepotoirFactory extends Factory
{
    /**
     * Le nom du modèle associé à cette factory.
     *
     * @var string
     */
    protected $model = Depotoir::class;

    /**
     * Définition des valeurs par défaut pour les attributs du modèle Depotoir.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'quartier_id' => Quartier::factory(), // Associe le dépot à un quartier existant
        ];
    }
}
