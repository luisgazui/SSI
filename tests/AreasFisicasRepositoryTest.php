<?php

use App\Models\AreasFisicas;
use App\Repositories\AreasFisicasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreasFisicasRepositoryTest extends TestCase
{
    use MakeAreasFisicasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AreasFisicasRepository
     */
    protected $areasFisicasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->areasFisicasRepo = App::make(AreasFisicasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAreasFisicas()
    {
        $areasFisicas = $this->fakeAreasFisicasData();
        $createdAreasFisicas = $this->areasFisicasRepo->create($areasFisicas);
        $createdAreasFisicas = $createdAreasFisicas->toArray();
        $this->assertArrayHasKey('id', $createdAreasFisicas);
        $this->assertNotNull($createdAreasFisicas['id'], 'Created AreasFisicas must have id specified');
        $this->assertNotNull(AreasFisicas::find($createdAreasFisicas['id']), 'AreasFisicas with given id must be in DB');
        $this->assertModelData($areasFisicas, $createdAreasFisicas);
    }

    /**
     * @test read
     */
    public function testReadAreasFisicas()
    {
        $areasFisicas = $this->makeAreasFisicas();
        $dbAreasFisicas = $this->areasFisicasRepo->find($areasFisicas->id);
        $dbAreasFisicas = $dbAreasFisicas->toArray();
        $this->assertModelData($areasFisicas->toArray(), $dbAreasFisicas);
    }

    /**
     * @test update
     */
    public function testUpdateAreasFisicas()
    {
        $areasFisicas = $this->makeAreasFisicas();
        $fakeAreasFisicas = $this->fakeAreasFisicasData();
        $updatedAreasFisicas = $this->areasFisicasRepo->update($fakeAreasFisicas, $areasFisicas->id);
        $this->assertModelData($fakeAreasFisicas, $updatedAreasFisicas->toArray());
        $dbAreasFisicas = $this->areasFisicasRepo->find($areasFisicas->id);
        $this->assertModelData($fakeAreasFisicas, $dbAreasFisicas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAreasFisicas()
    {
        $areasFisicas = $this->makeAreasFisicas();
        $resp = $this->areasFisicasRepo->delete($areasFisicas->id);
        $this->assertTrue($resp);
        $this->assertNull(AreasFisicas::find($areasFisicas->id), 'AreasFisicas should not exist in DB');
    }
}
