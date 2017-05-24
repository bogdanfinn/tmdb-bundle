<?php

namespace bogdanfinn\tmdbBundle\Conversion;

use bogdanfinn\tmdbBundle\Model\Season;


/**
 * Class responsible for transforming data coming from TMDb API into an model
 */
class SeasonTransformer extends Transformer
{
    /**
     * MovieTransformer constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $apiResponse
     * @return array|Season
     */
    public function assignSeasonToModel($apiResponse){
        if ($this->isResponseArray($apiResponse)) {
            return $this->generateModelsFromResponse($apiResponse);
        } else {
            return $this->generateModelFromResponse($apiResponse);
        }
    }

    /**
     * @param $apiResponse
     * @return Season
     */
    protected function generateModelFromResponse($apiResponse)
    {
        return new Season($apiResponse);
    }

    /**
     * @param $apiResponse
     * @return array
     */
    protected function generateModelsFromResponse($apiResponse)
    {
        $seasons = [];
        foreach ($apiResponse->results as $apiSeason) {
            $seasons[] = new Season($apiSeason);
        }
        return $seasons;
    }
}
