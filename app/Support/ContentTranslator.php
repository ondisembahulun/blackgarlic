<?php

namespace App\Support;

class ContentTranslator
{
    /**
     * Translate single-line or multi-paragraph dynamic content safely across line endings.
     */
    public static function text(?string $value): string
    {
        if ($value === null || trim($value) === '') {
            return '';
        }

        $normalized = str_replace(["\r\n", "\r"], "\n", trim($value));

        if (! str_contains($normalized, "\n\n")) {
            return __($normalized);
        }

        $paragraphs = preg_split('/\n{2,}/', $normalized) ?: [$normalized];

        $translated = array_map(
            static fn (string $paragraph): string => __(trim($paragraph)),
            $paragraphs
        );

        return implode("\n\n", $translated);
    }
}
