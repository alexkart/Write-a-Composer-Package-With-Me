<?php

namespace Laracasts\Transcriptions;

class Transcription
{
    protected array $lines;

    public static function load(string $path): self
    {
        $instance = new static;

        $instance->lines = $instance->discardIrrelevantLines(file($path));

        return $instance;
    }

    public function lines(): array
    {
        return $this->lines;
    }

    protected function discardIrrelevantLines(array $lines): array
    {
        return array_values(array_filter(
            array_map('trim', $lines),
            fn($line) => $line !== 'WEBVTT' && $line !== '' && ! is_numeric($line)
        ));
    }

    public function __toString(): string
    {
        return implode("", $this->lines);
    }
}
