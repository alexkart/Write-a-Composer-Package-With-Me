<?php

namespace Tests;

use Laracasts\Transcriptions\Transcription;
use PHPUnit\Framework\TestCase;

class TranscriptionTest extends TestCase
{
    /** @test */
    function it_loads_a_vtt_file()
    {
        $transcription = Transcription::load(__DIR__ .'/stubs/basic-example.vtt');

        $expected = file_get_contents(__DIR__ .'/stubs/basic-example.vtt');

        $this->assertEquals($expected, $transcription);
    }
}
