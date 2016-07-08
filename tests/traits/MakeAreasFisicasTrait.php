<?php

use Faker\Factory as Faker;
use App\Models\AreasFisicas;
use App\Repositories\AreasFisicasRepository;

trait MakeAreasFisicasTrait
{
    /**
     * Create fake instance of AreasFisicas and save it in database
     *
     * @param array $areasFisicasFields
     * @return AreasFisicas
     */
    public function makeAreasFisicas($areasFisicasFields = [])
    {
        /** @var AreasFisicasRepository $areasFisicasRepo */
        $areasFisicasRepo = App::make(AreasFisicasRepository::class);
        $theme = $this->fakeAreasFisicasData($areasFisicasFields);
        return $areasFisicasRepo->create($theme);
    }

    /**
     * Get fake instance of AreasFisicas
     *
     * @param array $areasFisicasFields
     * @return AreasFisicas
     */
    public function fakeAreasFisicas($areasFisicasFields = [])
    {
        return new AreasFisicas($this->fakeAreasFisicasData($areasFisicasFields));
    }

    /**
     * Get fake data of AreasFisicas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAreasFisicasData($areasFisicasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Areas' => $fake->word,
            'Enabled' => $fake->word
        ], $areasFisicasFields);
    }
}
