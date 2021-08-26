<?php

namespace Tests;

use Laracasts\Transcriptions\Transcription;
use PHPUnit\Framework\TestCase;

class TranscriptionTest extends TestCase
{
    /** @test */
    function it_loads_a_vtt_file_as_a_string()
    {
        $file = __DIR__ . '/stubs/basic-example.vtt';

        $transcription = Transcription::load($file);

        $this->assertStringContainsString('Here is a', $transcription);
        $this->assertStringContainsString('example of a VTT file', $transcription);
    }

    /** @test */
    function it_can_convert_to_an_array_of_lines()
    {
        $file = __DIR__ . '/stubs/basic-example.vtt';

        $this->assertCount(4, Transcription::load($file)->lines());
    }

    /** @test */
    function it_discards_irrelevant_lines_from_the_vtt_file()
    {
        $transcription = Transcription::load(__DIR__ . '/stubs/basic-example.vtt');

        $this->assertStringNotContainsString('WEBVTT', $transcription);
        $this->assertCount(4, $transcription->lines());
    }
}
