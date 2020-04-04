<?php

namespace Jackal\Downloader\Ext\Instagram\Crawler;

use Jackal\Downloader\Ext\Instagram\Exception\InstaramDownloadException;
use Symfony\Component\DomCrawler\Crawler;

class InstagramCrawler extends Crawler
{
    public function getInstagramURL() : string
    {
        $element = $this->filter('meta[property="og:video"]');

        if (!$element->count()) {
            throw InstaramDownloadException::videoURLsNotFound();
        }

        return $element->first()->attr('content');
    }
}
