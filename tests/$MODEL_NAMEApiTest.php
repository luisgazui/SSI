<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class $MODEL_NAMEApiTest extends TestCase
{
    use Make$MODEL_NAMETrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreate$MODEL_NAME()
    {
        $$MODELNAME = $this->fake$MODEL_NAMEData();
        $this->json('POST', '/api/v1/$MODELNAMES', $$MODELNAME);

        $this->assertApiResponse($$MODELNAME);
    }

    /**
     * @test
     */
    public function testRead$MODEL_NAME()
    {
        $$MODELNAME = $this->make$MODEL_NAME();
        $this->json('GET', '/api/v1/$MODELNAMES/'.$$MODELNAME->id);

        $this->assertApiResponse($$MODELNAME->toArray());
    }

    /**
     * @test
     */
    public function testUpdate$MODEL_NAME()
    {
        $$MODELNAME = $this->make$MODEL_NAME();
        $edited$MODEL_NAME = $this->fake$MODEL_NAMEData();

        $this->json('PUT', '/api/v1/$MODELNAMES/'.$$MODELNAME->id, $edited$MODEL_NAME);

        $this->assertApiResponse($edited$MODEL_NAME);
    }

    /**
     * @test
     */
    public function testDelete$MODEL_NAME()
    {
        $$MODELNAME = $this->make$MODEL_NAME();
        $this->json('DELETE', '/api/v1/$MODELNAMES/'.$$MODELNAME->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/$MODELNAMES/'.$$MODELNAME->id);

        $this->assertResponseStatus(404);
    }
}
