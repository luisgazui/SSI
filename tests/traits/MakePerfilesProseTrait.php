<?php

use Faker\Factory as Faker;
use App\Models\PerfilesProse;
use App\Repositories\PerfilesProseRepository;

trait MakePerfilesProseTrait
{
    /**
     * Create fake instance of PerfilesProse and save it in database
     *
     * @param array $perfilesProseFields
     * @return PerfilesProse
     */
    public function makePerfilesProse($perfilesProseFields = [])
    {
        /** @var PerfilesProseRepository $perfilesProseRepo */
        $perfilesProseRepo = App::make(PerfilesProseRepository::class);
        $theme = $this->fakePerfilesProseData($perfilesProseFields);
        return $perfilesProseRepo->create($theme);
    }

    /**
     * Get fake instance of PerfilesProse
     *
     * @param array $perfilesProseFields
     * @return PerfilesProse
     */
    public function fakePerfilesProse($perfilesProseFields = [])
    {
        return new PerfilesProse($this->fakePerfilesProseData($perfilesProseFields));
    }

    /**
     * Get fake data of PerfilesProse
     *
     * @param array $postFields
     * @return array
     */
    public function fakePerfilesProseData($perfilesProseFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'ID_Usuario' => $fake->word,
            'Nombre' => $fake->word,
            'Perfil prose actual' => $fake->word,
            'Participa en prose' => $fake->word,
            'A partir de' => $fake->word,
            'idPerfil' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $perfilesProseFields);
    }
}
