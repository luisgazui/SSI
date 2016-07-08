<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreasFisicasApiTest extends TestCase
{
    use MakeAreasFisicasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAreasFisicas()
    {
        $areasFisicas = $this->fakeAreasFisicasData();
        $this->json('POST', '/api/v1/areasFisicas', $areasFisicas);

        $this->assertApiResponse($areasFisicas);
    }

    /**
     * @test
     */
    public function testReadAreasFisicas()
    {
        $areasFisicas = $this->makeAreasFisicas();
        $this->json('GET', '/api/v1/areasFisicas/'.$areasFisicas->id);

        $this->assertApiResponse($areasFisicas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAreasFisicas()
    {
        $areasFisicas = $this->makeAreasFisicas();
        $editedAreasFisicas = $this->fakeAreasFisicasData();

        $this->json('PUT', '/api/v1/areasFisicas/'.$areasFisicas->id, $editedAreasFisicas);

        $this->assertApiResponse($editedAreasFisicas);
    }

    /**
     * @test
     */
    public function testDeleteAreasFisicas()
    {
        $areasFisicas = $this->makeAreasFisicas();
        $this->json('DELETE', '/api/v1/areasFisicas/'.$areasFisicas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/areasFisicas/'.$areasFisicas->id);

        $this->assertResponseStatus(404);
    }
}
