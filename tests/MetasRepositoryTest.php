<?php

use App\Models\Metas;
use App\Repositories\MetasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MetasRepositoryTest extends TestCase
{
    use MakeMetasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MetasRepository
     */
    protected $metasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->metasRepo = App::make(MetasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMetas()
    {
        $metas = $this->fakeMetasData();
        $createdMetas = $this->metasRepo->create($metas);
        $createdMetas = $createdMetas->toArray();
        $this->assertArrayHasKey('id', $createdMetas);
        $this->assertNotNull($createdMetas['id'], 'Created Metas must have id specified');
        $this->assertNotNull(Metas::find($createdMetas['id']), 'Metas with given id must be in DB');
        $this->assertModelData($metas, $createdMetas);
    }

    /**
     * @test read
     */
    public function testReadMetas()
    {
        $metas = $this->makeMetas();
        $dbMetas = $this->metasRepo->find($metas->id);
        $dbMetas = $dbMetas->toArray();
        $this->assertModelData($metas->toArray(), $dbMetas);
    }

    /**
     * @test update
     */
    public function testUpdateMetas()
    {
        $metas = $this->makeMetas();
        $fakeMetas = $this->fakeMetasData();
        $updatedMetas = $this->metasRepo->update($fakeMetas, $metas->id);
        $this->assertModelData($fakeMetas, $updatedMetas->toArray());
        $dbMetas = $this->metasRepo->find($metas->id);
        $this->assertModelData($fakeMetas, $dbMetas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMetas()
    {
        $metas = $this->makeMetas();
        $resp = $this->metasRepo->delete($metas->id);
        $this->assertTrue($resp);
        $this->assertNull(Metas::find($metas->id), 'Metas should not exist in DB');
    }
}
