<?php

use Faker\Factory as Faker;
use App\Models\Metas;
use App\Repositories\MetasRepository;

trait MakeMetasTrait
{
    /**
     * Create fake instance of Metas and save it in database
     *
     * @param array $metasFields
     * @return Metas
     */
    public function makeMetas($metasFields = [])
    {
        /** @var MetasRepository $metasRepo */
        $metasRepo = App::make(MetasRepository::class);
        $theme = $this->fakeMetasData($metasFields);
        return $metasRepo->create($theme);
    }

    /**
     * Get fake instance of Metas
     *
     * @param array $metasFields
     * @return Metas
     */
    public function fakeMetas($metasFields = [])
    {
        return new Metas($this->fakeMetasData($metasFields));
    }

    /**
     * Get fake data of Metas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMetasData($metasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idUsuario' => $fake->word,
            'Usuario' => $fake->word,
            'Inspecciones' => $fake->word,
            'Observaciones' => $fake->word,
            'Reuniones' => $fake->word,
            'Charlas' => $fake->word,
            'Interacciones' => $fake->word,
            'Empresa' => $fake->word,
            'Departamento' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $metasFields);
    }
}
