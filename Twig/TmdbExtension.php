<?php
namespace bogdanfinn\TmdbBundle\Twig;

class TmdbExtension extends \Twig_Extension
{
    public function __construct()
    {
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('tmdb_cover_url', array($this, 'getCoverUrl')),
            new \Twig_SimpleFilter('tmdb_backdrop_url', array($this, 'getBackdropUrl')),
        );
    }

    public function getCoverUrl(){

    }

    public function getBackdropUrl(){

    }

    public function getName()
    {
        return 'tmdb_extension';
    }
}
