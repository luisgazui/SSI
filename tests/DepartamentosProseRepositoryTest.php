<?php

use App\Models\DepartamentosProse;
use App\Repositories\DepartamentosProseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DepartamentosProseRepositoryTest extends TestCase
{
    use MakeDepartamentosProseTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DepartamentosProseRepository
     */
    protected $departamentosProseRepo;

    public function setUp()
    {
        parent::setUp();
        $this->departamentosProseRepo = App::make(DepartamentosProseRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDepartamentosProse()
    {
        $departamentosProse = $this->fakeDepartamentosProseData();
        $createdDepartamentosProse = $this->departamentosProseRepo->create($departamentosProse);
        $createdDepartamentosProse = $createdDepartamentosProse->toArray();
        $this->assertArrayHasKey('id', $createdDepartamentosProse);
        $this->assertNotNull($createdDepartamentosProse['id'], 'Created DepartamentosProse must have id specified');
        $this->assertNotNull(DepartamentosProse::find($createdDepartamentosProse['id']), 'DepartamentosProse with given id must be in DB');
        $this->assertModelData($departamentosProse, $createdDepartamentosProse);
    }

    /**
     * @test read
     */
    public function testReadDepartamentosProse()
    {
        $departamentosProse = $this->makeDepartamentosProse();
        $dbDepartamentosProse = $this->departamentosProseRepo->find($departamentosProse->id);
        $dbDepartamentosProse = $dbDepartamentosProse->toArray();
        $this->assertModelData($departamentosProse->toArray(), $dbDepartamentosProse);
    }

    /**
     * @test update
     */
    public function testUpdateDepartamentosProse()
    {
        $departamentosProse = $this->makeDepartamentosProse();
        $fakeDepartamentosProse = $this->fakeDepartamentosProseData();
        $updatedDepartamentosProse = $this->departamentosProseRepo->update($fakeDepartamentosProse, $departamentosProse->id);
        $this->assertModelData($fakeDepartamentosProse, $updatedDepartamentosProse->toArray());
        $dbDepartamentosProse = $this->departamentosProseRepo->find($departamentosProse->id);
        $this->assertModelData($fakeDepartamentosProse, $dbDepartamentosProse->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDepartamentosProse()
    {
        $departamentosProse = $this->makeDepartamentosProse();
        $resp = $this->departamentosProseRepo->delete($departamentosProse->id);
        $this->assertTrue($resp);
        $this->assertNull(DepartamentosProse::find($departamentosProse->id), 'DepartamentosProse should not exist in DB');
    }
}
