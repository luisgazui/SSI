<?php

use Faker\Factory as Faker;
use App\Models\$MODEL_NAME;
use App\Repositories\$MODEL_NAMERepository;

trait Make$MODEL_NAMETrait
{
    /**
     * Create fake instance of $MODEL_NAME and save it in database
     *
     * @param array $$MODELNAMEFields
     * @return $MODEL_NAME
     */
    public function make$MODEL_NAME($$MODELNAMEFields = [])
    {
        /** @var $MODEL_NAMERepository $$MODELNAMERepo */
        $$MODELNAMERepo = App::make($MODEL_NAMERepository::class);
        $theme = $this->fake$MODEL_NAMEData($$MODELNAMEFields);
        return $$MODELNAMERepo->create($theme);
    }

    /**
     * Get fake instance of $MODEL_NAME
     *
     * @param array $$MODELNAMEFields
     * @return $MODEL_NAME
     */
    public function fake$MODEL_NAME($$MODELNAMEFields = [])
    {
        return new $MODEL_NAME($this->fake$MODEL_NAMEData($$MODELNAMEFields));
    }

    /**
     * Get fake data of $MODEL_NAME
     *
     * @param array $postFields
     * @return array
     */
    public function fake$MODEL_NAMEData($$MODELNAMEFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $$MODELNAMEFields);
    }
}
