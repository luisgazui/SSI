<?php

use Faker\Factory as Faker;
use App\Models\Paramedico;
use App\Repositories\ParamedicoRepository;

trait MakeParamedicoTrait
{
    /**
     * Create fake instance of Paramedico and save it in database
     *
     * @param array $paramedicoFields
     * @return Paramedico
     */
    public function makeParamedico($paramedicoFields = [])
    {
        /** @var ParamedicoRepository $paramedicoRepo */
        $paramedicoRepo = App::make(ParamedicoRepository::class);
        $theme = $this->fakeParamedicoData($paramedicoFields);
        return $paramedicoRepo->create($theme);
    }

    /**
     * Get fake instance of Paramedico
     *
     * @param array $paramedicoFields
     * @return Paramedico
     */
    public function fakeParamedico($paramedicoFields = [])
    {
        return new Paramedico($this->fakeParamedicoData($paramedicoFields));
    }

    /**
     * Get fake data of Paramedico
     *
     * @param array $postFields
     * @return array
     */
    public function fakeParamedicoData($paramedicoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'IdReporte' => $fake->randomDigitNotNull,
            'Fecha' => $fake->word,
            'Turno' => $fake->word,
            'Incidentado' => $fake->word,
            'Descripci¢n' => $fake->word,
            'Categoria' => $fake->word,
            'Severidad' => $fake->word,
            'CAS' => $fake->word,
            'Empresa' => $fake->word,
            'Area' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $paramedicoFields);
    }
}
