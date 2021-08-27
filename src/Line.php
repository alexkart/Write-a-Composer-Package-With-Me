<?php

namespace Laracasts\Transcriptions;

class Line
{
    public function __construct(public string $timestamp, public string $body)
    {
        //
    }

    public function toAnchorTag()
    {
        return "<a href=\"?time={$this->beginningTimestamp()}\">{$this->body}</a>";
    }

    public function beginningTimestamp()
    {
        preg_match('/^\d{2}:(\d{2}:\d{2})\.\d{3}/', $this->timestamp, $matches);

        return $matches[1];
    }

    public static function valid($line)
    {
        return $line !== 'WEBVTT' && $line !== '' && !is_numeric($line);
    }
}