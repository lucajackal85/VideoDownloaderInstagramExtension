<?php


namespace Jackal\Downloader\Ext\Instagram\Exception;


use Jackal\Downloader\Exception\DownloadException;

class InstaramDownloadException extends DownloadException
{
    public static function videoURLsNotFound() : InstaramDownloadException
    {
        return new InstaramDownloadException('No video URLs found');
    }
}