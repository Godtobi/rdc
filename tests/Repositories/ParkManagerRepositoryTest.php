<?php namespace Tests\Repositories;

use App\Models\ParkManager;
use App\Repositories\ParkManagerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ParkManagerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ParkManagerRepository
     */
    protected $parkManagerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->parkManagerRepo = \App::make(ParkManagerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_park_manager()
    {
        $parkManager = factory(ParkManager::class)->make()->toArray();

        $createdParkManager = $this->parkManagerRepo->create($parkManager);

        $createdParkManager = $createdParkManager->toArray();
        $this->assertArrayHasKey('id', $createdParkManager);
        $this->assertNotNull($createdParkManager['id'], 'Created ParkManager must have id specified');
        $this->assertNotNull(ParkManager::find($createdParkManager['id']), 'ParkManager with given id must be in DB');
        $this->assertModelData($parkManager, $createdParkManager);
    }

    /**
     * @test read
     */
    public function test_read_park_manager()
    {
        $parkManager = factory(ParkManager::class)->create();

        $dbParkManager = $this->parkManagerRepo->find($parkManager->id);

        $dbParkManager = $dbParkManager->toArray();
        $this->assertModelData($parkManager->toArray(), $dbParkManager);
    }

    /**
     * @test update
     */
    public function test_update_park_manager()
    {
        $parkManager = factory(ParkManager::class)->create();
        $fakeParkManager = factory(ParkManager::class)->make()->toArray();

        $updatedParkManager = $this->parkManagerRepo->update($fakeParkManager, $parkManager->id);

        $this->assertModelData($fakeParkManager, $updatedParkManager->toArray());
        $dbParkManager = $this->parkManagerRepo->find($parkManager->id);
        $this->assertModelData($fakeParkManager, $dbParkManager->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_park_manager()
    {
        $parkManager = factory(ParkManager::class)->create();

        $resp = $this->parkManagerRepo->delete($parkManager->id);

        $this->assertTrue($resp);
        $this->assertNull(ParkManager::find($parkManager->id), 'ParkManager should not exist in DB');
    }
}
