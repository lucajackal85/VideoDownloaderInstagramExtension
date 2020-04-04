<?php

namespace Jackal\Downloader\Ext\Instagram\Tests\Crawler;

use Jackal\Downloader\Ext\Instagram\Crawler\InstagramCrawler;
use PHPUnit\Framework\TestCase;

class InstagramCrawlerTest extends TestCase
{
    public function testCrawlURL()
    {
        $crawler = new InstagramCrawler(file_get_contents(__DIR__ . '/../Sample/sample-video-page.html'));
        $this->assertEquals(
            'https://scontent-mxp1-1.cdninstagram.com/v/t50.16885-16/10000000_216801739538911_4539972948730308039_n.mp4?_nc_ht=scontent-mxp1-1.cdninstagram.com&_nc_cat=107&_nc_ohc=gZ6Lmu_S118AX8TgsVk&oe=5E8AE4E3&oh=06cd6e8c29835b50ab1aec3f782acf06',
            $crawler->getInstagramURL()
        );
    }
}
