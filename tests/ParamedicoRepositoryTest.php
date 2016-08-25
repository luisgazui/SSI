<?php

use App\Models\Paramedico;
use App\Repositories\ParamedicoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParamedicoRepositoryTest extends TestCase
{
    use MakeParamedicoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ParamedicoRepository
     */
    protected $paramedicoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->paramedicoRepo = App::make(ParamedicoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateParamedico()
    {
        $paramedico = $this->fakeParamedicoData();
        $createdParamedico = $this->paramedicoRepo->create($paramedico);
        $createdParamedico = $createdParamedico->toArray();
        $this->assertArrayHasKey('id', $createdParamedico);
        $this->assertNotNull($createdParamedico['id'], 'Created Paramedico must have id specified');
        $this->assertNotNull(Paramedico::find($createdParamedico['id']), 'Paramedico with given id must be in DB');
        $this->assertModelData($paramedico, $createdParamedico);
    }

    /**
     * @test read
     */
    public function testReadParamedico()
    {
        $paramedico = $this->makeParamedico();
        $dbParamedico = $this->paramedicoRepo->find($paramedico->id);
        $dbParamedico = $dbParamedico->toArray();
        $this->assertModelData($paramedico->toArray(), $dbParamedico);
    }

    /**
     * @test update
     */
    public function testUpdateParamedico()
    {
        $paramedico = $this->makeParamedico();
        $fakeParamedico = $this->fakeParamedicoData();
        $updatedParamedico = $this->paramedicoRepo->update($fakeParamedico, $paramedico->id);
        $this->assertModelData($fakeParamedico, $updatedParamedico->toArray());
        $dbParamedico = $this->paramedicoRepo->find($paramedico->id);
        $this->assertModelData($fakeParamedico, $dbParamedico->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteParamedico()
    {
        $paramedico = $this->makeParamedico();
        $resp = $this->paramedicoRepo->delete($paramedico->id);
        $this->assertTrue($resp);
        $this->assertNull(Paramedico::find($paramedico->id), 'Paramedico should not exist in DB');
    }
}
