<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParamedicoApiTest extends TestCase
{
    use MakeParamedicoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateParamedico()
    {
        $paramedico = $this->fakeParamedicoData();
        $this->json('POST', '/api/v1/paramedicos', $paramedico);

        $this->assertApiResponse($paramedico);
    }

    /**
     * @test
     */
    public function testReadParamedico()
    {
        $paramedico = $this->makeParamedico();
        $this->json('GET', '/api/v1/paramedicos/'.$paramedico->id);

        $this->assertApiResponse($paramedico->toArray());
    }

    /**
     * @test
     */
    public function testUpdateParamedico()
    {
        $paramedico = $this->makeParamedico();
        $editedParamedico = $this->fakeParamedicoData();

        $this->json('PUT', '/api/v1/paramedicos/'.$paramedico->id, $editedParamedico);

        $this->assertApiResponse($editedParamedico);
    }

    /**
     * @test
     */
    public function testDeleteParamedico()
    {
        $paramedico = $this->makeParamedico();
        $this->json('DELETE', '/api/v1/paramedicos/'.$paramedico->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/paramedicos/'.$paramedico->id);

        $this->assertResponseStatus(404);
    }
}
