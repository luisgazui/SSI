<?php

use Faker\Factory as Faker;
use App\Models\DepartamentosProse;
use App\Repositories\DepartamentosProseRepository;

trait MakeDepartamentosProseTrait
{
    /**
     * Create fake instance of DepartamentosProse and save it in database
     *
     * @param array $departamentosProseFields
     * @return DepartamentosProse
     */
    public function makeDepartamentosProse($departamentosProseFields = [])
    {
        /** @var DepartamentosProseRepository $departamentosProseRepo */
        $departamentosProseRepo = App::make(DepartamentosProseRepository::class);
        $theme = $this->fakeDepartamentosProseData($departamentosProseFields);
        return $departamentosProseRepo->create($theme);
    }

    /**
     * Get fake instance of DepartamentosProse
     *
     * @param array $departamentosProseFields
     * @return DepartamentosProse
     */
    public function fakeDepartamentosProse($departamentosProseFields = [])
    {
        return new DepartamentosProse($this->fakeDepartamentosProseData($departamentosProseFields));
    }

    /**
     * Get fake data of DepartamentosProse
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDepartamentosProseData($departamentosProseFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id' => $fake->word,
            'Departamento' => $fake->word,
            'descripcionProse' => $fake->word,
            'Habilitado' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $departamentosProseFields);
    }
}
