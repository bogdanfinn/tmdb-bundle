<?php

namespace bogdanfinn\tmdbBundle\Conversion;

use bogdanfinn\tmdbBundle\Model\Movie;
use bogdanfinn\tmdbBundle\Model\Person;
use bogdanfinn\tmdbBundle\Model\Season;
use bogdanfinn\tmdbBundle\Model\TvShow;


/**
 * Class responsible for transforming data coming from TMDb API into an model
 */
class SearchTransformer extends Transformer
{
    const MEDIA_TYPE_MOVIE = 'movie';
    const MEDIA_TYPE_TV = 'tv';
    const MEDIA_TYPE_PERSON = 'person';

    /**
     * MovieTransformer constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $apiResponse
     * @return array
     */
    public function assignMultiSearchToModel($apiResponse){
        if ($this->isResponseArray($apiResponse)) {
            return $this->generateModelsFromResponse($apiResponse);
        }
        return null;
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
        $searchModels = [];
        foreach ($apiResponse->results as $apiObject) {
            if($apiObject->media_type === self::MEDIA_TYPE_MOVIE) {
                $searchModels[] = new Movie($apiObject);
            } elseif($apiObject->media_type === self::MEDIA_TYPE_TV){
                $searchModels[] = new TvShow($apiObject);
            } elseif($apiObject->media_type === self::MEDIA_TYPE_PERSON) {
                $searchModels[] = new Person($apiObject);
            }
        }
        return $searchModels;
    }
}
