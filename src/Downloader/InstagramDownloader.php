<?php


namespace Jackal\Downloader\Ext\Instagram\Downloader;


use GuzzleHttp\Client;
use Jackal\Downloader\Downloader\AbstractDownloader;
use Jackal\Downloader\Exception\DownloadException;
use Jackal\Downloader\Ext\Instagram\Exception\InstaramDownloadException;
use Symfony\Component\DomCrawler\Crawler;

class InstagramDownloader extends AbstractDownloader
{
    const VIDEO_TYPE = 'instagram';

    public function getURL(): string
    {
        $client = new Client([
            'base_uri' => 'https://www.instagram.com/p/',
        ]);

        $response = $client->get($this->getVideoId().'/');

        $crawler = new Crawler($response->getBody()->getContents());

        $element = $crawler->filter('meta[property="og:video"]');

        if(!$element->count()){
            throw InstaramDownloadException::videoURLsNotFound();
        }

        return $element->first()->attr('content');
    }
}