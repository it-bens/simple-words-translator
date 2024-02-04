<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator\Translation;

use ITB\SimpleWordsTranslator\Translation;

final class En implements Translation
{
    public static function isoCode(): string
    {
        return 'en';
    }

    public static function name(): string
    {
        return 'english';
    }

    public function no(): string
    {
        return 'No';
    }

    public function yes(): string
    {
        return 'Yes';
    }
}
