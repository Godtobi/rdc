<?php namespace Tests\Repositories;

use App\Models\VehicleType;
use App\Repositories\VehicleTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VehicleTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VehicleTypeRepository
     */
    protected $vehicleTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vehicleTypeRepo = \App::make(VehicleTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vehicle_type()
    {
        $vehicleType = factory(VehicleType::class)->make()->toArray();

        $createdVehicleType = $this->vehicleTypeRepo->create($vehicleType);

        $createdVehicleType = $createdVehicleType->toArray();
        $this->assertArrayHasKey('id', $createdVehicleType);
        $this->assertNotNull($createdVehicleType['id'], 'Created VehicleType must have id specified');
        $this->assertNotNull(VehicleType::find($createdVehicleType['id']), 'VehicleType with given id must be in DB');
        $this->assertModelData($vehicleType, $createdVehicleType);
    }

    /**
     * @test read
     */
    public function test_read_vehicle_type()
    {
        $vehicleType = factory(VehicleType::class)->create();

        $dbVehicleType = $this->vehicleTypeRepo->find($vehicleType->id);

        $dbVehicleType = $dbVehicleType->toArray();
        $this->assertModelData($vehicleType->toArray(), $dbVehicleType);
    }

    /**
     * @test update
     */
    public function test_update_vehicle_type()
    {
        $vehicleType = factory(VehicleType::class)->create();
        $fakeVehicleType = factory(VehicleType::class)->make()->toArray();

        $updatedVehicleType = $this->vehicleTypeRepo->update($fakeVehicleType, $vehicleType->id);

        $this->assertModelData($fakeVehicleType, $updatedVehicleType->toArray());
        $dbVehicleType = $this->vehicleTypeRepo->find($vehicleType->id);
        $this->assertModelData($fakeVehicleType, $dbVehicleType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vehicle_type()
    {
        $vehicleType = factory(VehicleType::class)->create();

        $resp = $this->vehicleTypeRepo->delete($vehicleType->id);

        $this->assertTrue($resp);
        $this->assertNull(VehicleType::find($vehicleType->id), 'VehicleType should not exist in DB');
    }
}
