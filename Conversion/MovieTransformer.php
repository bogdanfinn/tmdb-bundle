<?php

namespace bogdanfinn\TmdbBundle\Conversion;

use bogdanfinn\TmdbBundle\Model\Movie;


/**
 * Class responsible for transforming data coming from TMDb API into an model
 */
class MovieTransformer extends Transformer
{
    /**
     * MovieTransformer constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $apiResponse
     * @return array|Movie
     */
    public function assignMovieToModel($apiResponse){
        if ($this->isResponseArray($apiResponse)) {
            return $this->generateModelsFromResponse($apiResponse);
        } else {
            return $this->generateModelFromResponse($apiResponse);
        }
    }

    /**
     * @param $apiResponse
     * @return Movie
     */
    protected function generateModelFromResponse($apiResponse)
    {
        return new Movie($apiResponse);
    }

    /**
     * @param $apiResponse
     * @return array
     */
    protected function generateModelsFromResponse($apiResponse)
    {
        $movies = [];
        foreach ($apiResponse->results as $apiMovie) {
            $movies[] = new Movie($apiMovie);
        }
        return $movies;
    }
}
