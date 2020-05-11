<?php


namespace Jackal\Downloader\Ext\Instagram\Tests\Downloader;


use Jackal\Downloader\Ext\Instagram\Downloader\InstagramDownloader;
use PHPUnit\Framework\TestCase;

class InstagramDownloaderTest extends TestCase
{
    public function getURLs(){
        return [
            ['https://www.instagram.com/p/B_vCe3inxPS/'],
            ['https://www.instagram.com/tv/B_vCe3inxPS/?utm_source=ig_web_copy_link'],
        ];
    }

    /**
     * @dataProvider getURLs
     */
    public function testGetPublicUrlRegex($string){

        preg_match(InstagramDownloader::getPublicUrlRegex(), $string, $matches);

        $this->assertEquals('B_vCe3inxPS', $matches[1]);

    }
}