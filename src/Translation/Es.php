<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator\Translation;

use ITB\SimpleWordsTranslator\Translation;

final class Es implements Translation
{
    public static function isoCode(): string
    {
        return 'es';
    }

    public static function name(): string
    {
        return 'español';
    }

    public function no(): string
    {
        return 'No';
    }

    public function yes(): string
    {
        return 'Sí'; // Note the accent on the 'i'
    }
}
