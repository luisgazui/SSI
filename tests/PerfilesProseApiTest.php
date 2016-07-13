<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerfilesProseApiTest extends TestCase
{
    use MakePerfilesProseTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePerfilesProse()
    {
        $perfilesProse = $this->fakePerfilesProseData();
        $this->json('POST', '/api/v1/perfilesProses', $perfilesProse);

        $this->assertApiResponse($perfilesProse);
    }

    /**
     * @test
     */
    public function testReadPerfilesProse()
    {
        $perfilesProse = $this->makePerfilesProse();
        $this->json('GET', '/api/v1/perfilesProses/'.$perfilesProse->id);

        $this->assertApiResponse($perfilesProse->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePerfilesProse()
    {
        $perfilesProse = $this->makePerfilesProse();
        $editedPerfilesProse = $this->fakePerfilesProseData();

        $this->json('PUT', '/api/v1/perfilesProses/'.$perfilesProse->id, $editedPerfilesProse);

        $this->assertApiResponse($editedPerfilesProse);
    }

    /**
     * @test
     */
    public function testDeletePerfilesProse()
    {
        $perfilesProse = $this->makePerfilesProse();
        $this->json('DELETE', '/api/v1/perfilesProses/'.$perfilesProse->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/perfilesProses/'.$perfilesProse->id);

        $this->assertResponseStatus(404);
    }
}
