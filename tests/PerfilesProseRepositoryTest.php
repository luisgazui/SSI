<?php

use App\Models\PerfilesProse;
use App\Repositories\PerfilesProseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerfilesProseRepositoryTest extends TestCase
{
    use MakePerfilesProseTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PerfilesProseRepository
     */
    protected $perfilesProseRepo;

    public function setUp()
    {
        parent::setUp();
        $this->perfilesProseRepo = App::make(PerfilesProseRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePerfilesProse()
    {
        $perfilesProse = $this->fakePerfilesProseData();
        $createdPerfilesProse = $this->perfilesProseRepo->create($perfilesProse);
        $createdPerfilesProse = $createdPerfilesProse->toArray();
        $this->assertArrayHasKey('id', $createdPerfilesProse);
        $this->assertNotNull($createdPerfilesProse['id'], 'Created PerfilesProse must have id specified');
        $this->assertNotNull(PerfilesProse::find($createdPerfilesProse['id']), 'PerfilesProse with given id must be in DB');
        $this->assertModelData($perfilesProse, $createdPerfilesProse);
    }

    /**
     * @test read
     */
    public function testReadPerfilesProse()
    {
        $perfilesProse = $this->makePerfilesProse();
        $dbPerfilesProse = $this->perfilesProseRepo->find($perfilesProse->id);
        $dbPerfilesProse = $dbPerfilesProse->toArray();
        $this->assertModelData($perfilesProse->toArray(), $dbPerfilesProse);
    }

    /**
     * @test update
     */
    public function testUpdatePerfilesProse()
    {
        $perfilesProse = $this->makePerfilesProse();
        $fakePerfilesProse = $this->fakePerfilesProseData();
        $updatedPerfilesProse = $this->perfilesProseRepo->update($fakePerfilesProse, $perfilesProse->id);
        $this->assertModelData($fakePerfilesProse, $updatedPerfilesProse->toArray());
        $dbPerfilesProse = $this->perfilesProseRepo->find($perfilesProse->id);
        $this->assertModelData($fakePerfilesProse, $dbPerfilesProse->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePerfilesProse()
    {
        $perfilesProse = $this->makePerfilesProse();
        $resp = $this->perfilesProseRepo->delete($perfilesProse->id);
        $this->assertTrue($resp);
        $this->assertNull(PerfilesProse::find($perfilesProse->id), 'PerfilesProse should not exist in DB');
    }
}
