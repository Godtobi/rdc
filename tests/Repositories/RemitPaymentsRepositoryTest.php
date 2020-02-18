<?php namespace Tests\Repositories;

use App\Models\RemitPayments;
use App\Repositories\RemitPaymentsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RemitPaymentsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RemitPaymentsRepository
     */
    protected $remitPaymentsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->remitPaymentsRepo = \App::make(RemitPaymentsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_remit_payments()
    {
        $remitPayments = factory(RemitPayments::class)->make()->toArray();

        $createdRemitPayments = $this->remitPaymentsRepo->create($remitPayments);

        $createdRemitPayments = $createdRemitPayments->toArray();
        $this->assertArrayHasKey('id', $createdRemitPayments);
        $this->assertNotNull($createdRemitPayments['id'], 'Created RemitPayments must have id specified');
        $this->assertNotNull(RemitPayments::find($createdRemitPayments['id']), 'RemitPayments with given id must be in DB');
        $this->assertModelData($remitPayments, $createdRemitPayments);
    }

    /**
     * @test read
     */
    public function test_read_remit_payments()
    {
        $remitPayments = factory(RemitPayments::class)->create();

        $dbRemitPayments = $this->remitPaymentsRepo->find($remitPayments->id);

        $dbRemitPayments = $dbRemitPayments->toArray();
        $this->assertModelData($remitPayments->toArray(), $dbRemitPayments);
    }

    /**
     * @test update
     */
    public function test_update_remit_payments()
    {
        $remitPayments = factory(RemitPayments::class)->create();
        $fakeRemitPayments = factory(RemitPayments::class)->make()->toArray();

        $updatedRemitPayments = $this->remitPaymentsRepo->update($fakeRemitPayments, $remitPayments->id);

        $this->assertModelData($fakeRemitPayments, $updatedRemitPayments->toArray());
        $dbRemitPayments = $this->remitPaymentsRepo->find($remitPayments->id);
        $this->assertModelData($fakeRemitPayments, $dbRemitPayments->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_remit_payments()
    {
        $remitPayments = factory(RemitPayments::class)->create();

        $resp = $this->remitPaymentsRepo->delete($remitPayments->id);

        $this->assertTrue($resp);
        $this->assertNull(RemitPayments::find($remitPayments->id), 'RemitPayments should not exist in DB');
    }
}
