<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\RemitPayments;

class RemitPaymentsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_remit_payments()
    {
        $remitPayments = factory(RemitPayments::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/remit_payments', $remitPayments
        );

        $this->assertApiResponse($remitPayments);
    }

    /**
     * @test
     */
    public function test_read_remit_payments()
    {
        $remitPayments = factory(RemitPayments::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/remit_payments/'.$remitPayments->id
        );

        $this->assertApiResponse($remitPayments->toArray());
    }

    /**
     * @test
     */
    public function test_update_remit_payments()
    {
        $remitPayments = factory(RemitPayments::class)->create();
        $editedRemitPayments = factory(RemitPayments::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/remit_payments/'.$remitPayments->id,
            $editedRemitPayments
        );

        $this->assertApiResponse($editedRemitPayments);
    }

    /**
     * @test
     */
    public function test_delete_remit_payments()
    {
        $remitPayments = factory(RemitPayments::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/remit_payments/'.$remitPayments->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/remit_payments/'.$remitPayments->id
        );

        $this->response->assertStatus(404);
    }
}
