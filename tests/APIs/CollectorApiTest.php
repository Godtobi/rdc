<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Collector;

class CollectorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_collector()
    {
        $collector = factory(Collector::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/collectors', $collector
        );

        $this->assertApiResponse($collector);
    }

    /**
     * @test
     */
    public function test_read_collector()
    {
        $collector = factory(Collector::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/collectors/'.$collector->id
        );

        $this->assertApiResponse($collector->toArray());
    }

    /**
     * @test
     */
    public function test_update_collector()
    {
        $collector = factory(Collector::class)->create();
        $editedCollector = factory(Collector::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/collectors/'.$collector->id,
            $editedCollector
        );

        $this->assertApiResponse($editedCollector);
    }

    /**
     * @test
     */
    public function test_delete_collector()
    {
        $collector = factory(Collector::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/collectors/'.$collector->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/collectors/'.$collector->id
        );

        $this->response->assertStatus(404);
    }
}
