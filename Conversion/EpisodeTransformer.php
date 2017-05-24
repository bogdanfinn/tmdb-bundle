<?php

namespace bogdanfinn\TmdbBundle\Conversion;

use bogdanfinn\TmdbBundle\Model\Episode;


/**
 * Class responsible for transforming data coming from TMDb API into an model
 */
class EpisodeTransformer extends Transformer
{
    /**
     * EpisodeTransformer constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $apiResponse
     * @return array|Episode
     */
    public function assignEpisodeToModel($apiResponse){
        if ($this->isResponseArray($apiResponse)) {
            return $this->generateModelsFromResponse($apiResponse);
        } else {
            return $this->generateModelFromResponse($apiResponse);
        }
    }

    /**
     * @param $apiResponse
     * @return Episode
     */
    protected function generateModelFromResponse($apiResponse)
    {
        return new Episode($apiResponse);
    }

    /**
     * @param $apiResponse
     * @return array
     */
    protected function generateModelsFromResponse($apiResponse)
    {
        $episodes = [];
        foreach ($apiResponse->results as $apiEpisode) {
            $episodes[] = new Episode($apiEpisode);
        }
        return $episodes;
    }
}
