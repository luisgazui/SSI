<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DepartamentosProseApiTest extends TestCase
{
    use MakeDepartamentosProseTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDepartamentosProse()
    {
        $departamentosProse = $this->fakeDepartamentosProseData();
        $this->json('POST', '/api/v1/departamentosProses', $departamentosProse);

        $this->assertApiResponse($departamentosProse);
    }

    /**
     * @test
     */
    public function testReadDepartamentosProse()
    {
        $departamentosProse = $this->makeDepartamentosProse();
        $this->json('GET', '/api/v1/departamentosProses/'.$departamentosProse->id);

        $this->assertApiResponse($departamentosProse->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDepartamentosProse()
    {
        $departamentosProse = $this->makeDepartamentosProse();
        $editedDepartamentosProse = $this->fakeDepartamentosProseData();

        $this->json('PUT', '/api/v1/departamentosProses/'.$departamentosProse->id, $editedDepartamentosProse);

        $this->assertApiResponse($editedDepartamentosProse);
    }

    /**
     * @test
     */
    public function testDeleteDepartamentosProse()
    {
        $departamentosProse = $this->makeDepartamentosProse();
        $this->json('DELETE', '/api/v1/departamentosProses/'.$departamentosProse->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/departamentosProses/'.$departamentosProse->id);

        $this->assertResponseStatus(404);
    }
}
