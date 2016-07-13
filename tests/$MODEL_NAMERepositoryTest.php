<?php

use App\Models\$MODEL_NAME;
use App\Repositories\$MODEL_NAMERepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class $MODEL_NAMERepositoryTest extends TestCase
{
    use Make$MODEL_NAMETrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var $MODEL_NAMERepository
     */
    protected $$MODELNAMERepo;

    public function setUp()
    {
        parent::setUp();
        $this->$MODELNAMERepo = App::make($MODEL_NAMERepository::class);
    }

    /**
     * @test create
     */
    public function testCreate$MODEL_NAME()
    {
        $$MODELNAME = $this->fake$MODEL_NAMEData();
        $created$MODEL_NAME = $this->$MODELNAMERepo->create($$MODELNAME);
        $created$MODEL_NAME = $created$MODEL_NAME->toArray();
        $this->assertArrayHasKey('id', $created$MODEL_NAME);
        $this->assertNotNull($created$MODEL_NAME['id'], 'Created $MODEL_NAME must have id specified');
        $this->assertNotNull($MODEL_NAME::find($created$MODEL_NAME['id']), '$MODEL_NAME with given id must be in DB');
        $this->assertModelData($$MODELNAME, $created$MODEL_NAME);
    }

    /**
     * @test read
     */
    public function testRead$MODEL_NAME()
    {
        $$MODELNAME = $this->make$MODEL_NAME();
        $db$MODEL_NAME = $this->$MODELNAMERepo->find($$MODELNAME->id);
        $db$MODEL_NAME = $db$MODEL_NAME->toArray();
        $this->assertModelData($$MODELNAME->toArray(), $db$MODEL_NAME);
    }

    /**
     * @test update
     */
    public function testUpdate$MODEL_NAME()
    {
        $$MODELNAME = $this->make$MODEL_NAME();
        $fake$MODEL_NAME = $this->fake$MODEL_NAMEData();
        $updated$MODEL_NAME = $this->$MODELNAMERepo->update($fake$MODEL_NAME, $$MODELNAME->id);
        $this->assertModelData($fake$MODEL_NAME, $updated$MODEL_NAME->toArray());
        $db$MODEL_NAME = $this->$MODELNAMERepo->find($$MODELNAME->id);
        $this->assertModelData($fake$MODEL_NAME, $db$MODEL_NAME->toArray());
    }

    /**
     * @test delete
     */
    public function testDelete$MODEL_NAME()
    {
        $$MODELNAME = $this->make$MODEL_NAME();
        $resp = $this->$MODELNAMERepo->delete($$MODELNAME->id);
        $this->assertTrue($resp);
        $this->assertNull($MODEL_NAME::find($$MODELNAME->id), '$MODEL_NAME should not exist in DB');
    }
}
