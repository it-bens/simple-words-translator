<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator\Translation;

use ITB\SimpleWordsTranslator\Translation;

final class De implements Translation
{
    public static function isoCode(): string
    {
        return 'de';
    }

    public static function name(): string
    {
        return 'deutsch';
    }

    public function no(): string
    {
        return 'Nein';
    }

    public function yes(): string
    {
        return 'Ja';
    }
}
