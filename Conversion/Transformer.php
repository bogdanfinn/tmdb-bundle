<?php

namespace bogdanfinn\TmdbBundle\Conversion;


abstract class Transformer
{

    /**
     * @param $apiResponse
     * @return bool
     */
    protected function isResponseArray($apiResponse)
    {
        return property_exists($apiResponse, 'results') && is_array($apiResponse->results);
    }

    protected abstract function generateModelFromResponse($apiResponse);

    protected abstract function generateModelsFromResponse($apiResponse);
}