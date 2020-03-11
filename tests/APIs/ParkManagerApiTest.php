<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ParkManager;

class ParkManagerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_park_manager()
    {
        $parkManager = factory(ParkManager::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/park_managers', $parkManager
        );

        $this->assertApiResponse($parkManager);
    }

    /**
     * @test
     */
    public function test_read_park_manager()
    {
        $parkManager = factory(ParkManager::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/park_managers/'.$parkManager->id
        );

        $this->assertApiResponse($parkManager->toArray());
    }

    /**
     * @test
     */
    public function test_update_park_manager()
    {
        $parkManager = factory(ParkManager::class)->create();
        $editedParkManager = factory(ParkManager::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/park_managers/'.$parkManager->id,
            $editedParkManager
        );

        $this->assertApiResponse($editedParkManager);
    }

    /**
     * @test
     */
    public function test_delete_park_manager()
    {
        $parkManager = factory(ParkManager::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/park_managers/'.$parkManager->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/park_managers/'.$parkManager->id
        );

        $this->response->assertStatus(404);
    }
}
