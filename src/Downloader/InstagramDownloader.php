<?php

namespace Jackal\Downloader\Ext\Instagram\Downloader;

use Jackal\Downloader\Downloader\AbstractDownloader;
use Jackal\Downloader\Ext\Instagram\Client\InstagramClient;
use Jackal\Downloader\Ext\Instagram\Crawler\InstagramCrawler;

class InstagramDownloader extends AbstractDownloader
{
    const VIDEO_TYPE = 'instagram';

    public function getURL(): string
    {
        $client = new InstagramClient();

        $response = $client->getVideoContent($this->getVideoId());

        $crawler = new InstagramCrawler($response->getBody()->getContents());

        return $crawler->getInstagramURL();
    }

    public static function getPublicUrlRegex(): string
    {
        return '/instagram\.com\/(?:tv|p)\/(.*)\//Ui';
    }

    public static function getType(): string
    {
        return 'instagram';
    }
}
