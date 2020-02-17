<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\VehicleType;

class VehicleTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vehicle_type()
    {
        $vehicleType = factory(VehicleType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vehicle_types', $vehicleType
        );

        $this->assertApiResponse($vehicleType);
    }

    /**
     * @test
     */
    public function test_read_vehicle_type()
    {
        $vehicleType = factory(VehicleType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/vehicle_types/'.$vehicleType->id
        );

        $this->assertApiResponse($vehicleType->toArray());
    }

    /**
     * @test
     */
    public function test_update_vehicle_type()
    {
        $vehicleType = factory(VehicleType::class)->create();
        $editedVehicleType = factory(VehicleType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vehicle_types/'.$vehicleType->id,
            $editedVehicleType
        );

        $this->assertApiResponse($editedVehicleType);
    }

    /**
     * @test
     */
    public function test_delete_vehicle_type()
    {
        $vehicleType = factory(VehicleType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vehicle_types/'.$vehicleType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vehicle_types/'.$vehicleType->id
        );

        $this->response->assertStatus(404);
    }
}
