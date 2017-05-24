<?php

namespace bogdanfinn\tmdbBundle\Conversion;

use bogdanfinn\tmdbBundle\Model\Episode;
use bogdanfinn\tmdbBundle\Model\Season;
use bogdanfinn\tmdbBundle\Model\TvShow;

/**
 * Class responsible for transforming data coming from TMDb API into an model
 */
class TvShowTransformer extends Transformer
{
    /**
     * TvShowTransformer constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $apiResponse
     * @return array
     */
    public function assignTvShowToModel($apiResponse)
    {
        if ($this->isResponseArray($apiResponse)) {
            return $this->generateModelsFromResponse($apiResponse);
        } else {
            return $this->generateModelFromResponse($apiResponse);
        }
    }

    /**
     * @param $apiResponse
     * @return array
     */
    protected function generateModelFromResponse($apiResponse)
    {
        return new TvShow($apiResponse);
    }

    /**
     * @param $apiResponse
     * @return array
     */
    protected function generateModelsFromResponse($apiResponse)
    {
        $tvShows = [];
        foreach ($apiResponse->results as $apiTvShow) {
            $tvShows[] = new TvShow($apiTvShow);
        }
        return $tvShows;
    }

}
