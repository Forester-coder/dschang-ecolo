<?php

namespace Tests\Feature;

use App\Models\Depotoir;
use App\Models\Quartier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Classe de test pour le modèle Depotoir.
 *
 * Cette classe contient des tests pour les opérations CRUD de base sur le modèle Depotoir.
 */
class DepotoirTest extends TestCase
{
    // Utilise RefreshDatabase pour réinitialiser la base de données entre les tests.
    // Cela assure que les tests sont indépendants et ne se polluent pas entre eux.
    use RefreshDatabase;

    /**
     * Test de création d'un dépot.
     *
     * Ce test vérifie que nous pouvons créer un nouveau dépot d'ordures en envoyant
     * une requête POST avec les données appropriées, et que les données sont
     * correctement stockées dans la base de données.
     *
     * @return void
     */
    public function test_it_can_create_a_depotoir()
    {
        // Crée un quartier fictif à utiliser dans le test.
        $quartier = Quartier::factory()->create();

        // Simule une requête HTTP POST vers la route de création de dépotoirs.
        $response = $this->post(route('depotoirs.store'), [
            'latitude' => '40.7128',            // Données fictives pour la latitude.
            'longitude' => '-74.0060',          // Données fictives pour la longitude.
            'quartier_id' => $quartier->id,     // Utilise l'ID du quartier créé précédemment.
        ]);

        // Vérifie que la réponse est une redirection vers la liste des dépotoirs.
        $response->assertRedirect(route('depotoirs.index'));

        // Vérifie que les données ont été insérées dans la table 'depotoirs'.
        $this->assertDatabaseHas('depotoirs', [
            'latitude' => '40.7128',            // Vérifie la latitude.
            'longitude' => '-74.0060',          // Vérifie la longitude.
            'quartier_id' => $quartier->id,     // Vérifie l'association avec le quartier.
        ]);
    }

    /**
     * Test de mise à jour d'un dépot.
     *
     * Ce test vérifie que nous pouvons mettre à jour un dépot existant
     * en envoyant une requête PUT avec les données mises à jour.
     *
     * @return void
     */
    public function test_it_can_update_a_depotoir()
    {
        // Crée un quartier et un dépot fictifs pour le test.
        $quartier = Quartier::factory()->create();
        $depotoir = Depotoir::factory()->create(['quartier_id' => $quartier->id]);

        // Simule une requête HTTP PUT pour mettre à jour le dépot.
        $response = $this->put(route('depotoirs.update', $depotoir), [
            'latitude' => '40.7127',            // Nouvelle latitude fictive.
            'longitude' => '-74.0059',          // Nouvelle longitude fictive.
            'quartier_id' => $quartier->id,     // Maintient l'association avec le quartier.
        ]);

        // Vérifie que la réponse est une redirection vers la vue du dépot.
        $response->assertRedirect(route('depotoirs.show', $depotoir));

        // Vérifie que les données mises à jour ont été enregistrées dans la base de données.
        $this->assertDatabaseHas('depotoirs', [
            'id' => $depotoir->id,
            'latitude' => '40.7127',            // Vérifie la nouvelle latitude.
            'longitude' => '-74.0059',          // Vérifie la nouvelle longitude.
            'quartier_id' => $quartier->id,     // Vérifie l'association avec le quartier.
        ]);
    }

    /**
     * Test de suppression d'un dépot.
     *
     * Ce test vérifie que nous pouvons supprimer un dépot existant
     * en envoyant une requête DELETE et que le dépot est retiré de la base de données.
     *
     * @return void
     */
    public function test_it_can_delete_a_depotoir()
    {
        // Crée un dépot fictif pour le test.
        $depotoir = Depotoir::factory()->create();

        // Simule une requête HTTP DELETE pour supprimer le dépot.
        $response = $this->delete(route('depotoirs.destroy', $depotoir));

        // Vérifie que la réponse est une redirection vers la liste des dépotoirs.
        $response->assertRedirect(route('depotoirs.index'));

        // Vérifie que le dépot a été supprimé de la base de données.
        $this->assertDatabaseMissing('depotoirs', [
            'id' => $depotoir->id,              // Vérifie que l'ID n'existe plus.
        ]);
    }

    /**
     * Test de consultation des dépotoirs.
     *
     * Ce test vérifie que nous pouvons consulter les dépotoirs existants
     * et que les données sont correctement affichées dans la liste.
     *
     * @return void
     */
    public function test_it_can_list_depotoirs()
    {
        // Crée plusieurs dépotoirs fictifs pour le test.
        $depotoirs = Depotoir::factory()->count(3)->create();

        // Simule une requête HTTP GET pour récupérer la liste des dépotoirs.
        $response = $this->get(route('depotoirs.index'));

        // Vérifie que la réponse est de statut 200 (OK).
        $response->assertStatus(200);

        // Vérifie que les données de chaque dépot sont présentes dans la réponse.
        $depotoirs->each(function ($depotoir) use ($response) {
            $response->assertSee($depotoir->latitude);
            $response->assertSee($depotoir->longitude);
        });
    }

    public function test_a_depotoir_belongs_to_a_quartier()
    {
        // Crée un quartier et un dépot fictifs pour le test.
        $quartier = Quartier::factory()->create();
        $depotoir = Depotoir::factory()->create(['quartier_id' => $quartier->id]);

        // Vérifie que le dépot appartient au quartier.
        $this->assertInstanceOf(Quartier::class, $depotoir->quartier);
        $this->assertEquals($quartier->id, $depotoir->quartier->id);
    }




    
}
