<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MetasApiTest extends TestCase
{
    use MakeMetasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMetas()
    {
        $metas = $this->fakeMetasData();
        $this->json('POST', '/api/v1/metas', $metas);

        $this->assertApiResponse($metas);
    }

    /**
     * @test
     */
    public function testReadMetas()
    {
        $metas = $this->makeMetas();
        $this->json('GET', '/api/v1/metas/'.$metas->id);

        $this->assertApiResponse($metas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMetas()
    {
        $metas = $this->makeMetas();
        $editedMetas = $this->fakeMetasData();

        $this->json('PUT', '/api/v1/metas/'.$metas->id, $editedMetas);

        $this->assertApiResponse($editedMetas);
    }

    /**
     * @test
     */
    public function testDeleteMetas()
    {
        $metas = $this->makeMetas();
        $this->json('DELETE', '/api/v1/metas/'.$metas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/metas/'.$metas->id);

        $this->assertResponseStatus(404);
    }
}
