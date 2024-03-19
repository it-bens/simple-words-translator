<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator\Translation;

use ITB\SimpleWordsTranslator\Translation;

final class It implements Translation
{
    public static function isoCode(): string
    {
        return 'it';
    }

    public static function name(): string
    {
        return 'italiano';
    }

    public function no(): string
    {
        return 'No';
    }

    public function yes(): string
    {
        return 'Sì'; // Note the accent on the 'i'
    }
}
