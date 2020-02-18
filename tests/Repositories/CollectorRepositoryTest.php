<?php namespace Tests\Repositories;

use App\Models\Collector;
use App\Repositories\CollectorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CollectorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CollectorRepository
     */
    protected $collectorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->collectorRepo = \App::make(CollectorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_collector()
    {
        $collector = factory(Collector::class)->make()->toArray();

        $createdCollector = $this->collectorRepo->create($collector);

        $createdCollector = $createdCollector->toArray();
        $this->assertArrayHasKey('id', $createdCollector);
        $this->assertNotNull($createdCollector['id'], 'Created Collector must have id specified');
        $this->assertNotNull(Collector::find($createdCollector['id']), 'Collector with given id must be in DB');
        $this->assertModelData($collector, $createdCollector);
    }

    /**
     * @test read
     */
    public function test_read_collector()
    {
        $collector = factory(Collector::class)->create();

        $dbCollector = $this->collectorRepo->find($collector->id);

        $dbCollector = $dbCollector->toArray();
        $this->assertModelData($collector->toArray(), $dbCollector);
    }

    /**
     * @test update
     */
    public function test_update_collector()
    {
        $collector = factory(Collector::class)->create();
        $fakeCollector = factory(Collector::class)->make()->toArray();

        $updatedCollector = $this->collectorRepo->update($fakeCollector, $collector->id);

        $this->assertModelData($fakeCollector, $updatedCollector->toArray());
        $dbCollector = $this->collectorRepo->find($collector->id);
        $this->assertModelData($fakeCollector, $dbCollector->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_collector()
    {
        $collector = factory(Collector::class)->create();

        $resp = $this->collectorRepo->delete($collector->id);

        $this->assertTrue($resp);
        $this->assertNull(Collector::find($collector->id), 'Collector should not exist in DB');
    }
}
