<?php

namespace Jackal\Downloader\Ext\Instagram\Client;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class InstagramClient extends Client
{
    protected $videoId;

    public function __construct(array $config = [])
    {
        $config = array_merge($config, [
            'base_uri' => 'https://www.instagram.com/p/',
        ]);

        parent::__construct($config);
    }

    public function getVideoContent($videoId) : ResponseInterface
    {
        return $this->get($videoId . '/');
    }
}
