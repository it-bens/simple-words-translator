<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator\Translation;

use ITB\SimpleWordsTranslator\Translation;

final class Nl implements Translation
{
    public static function isoCode(): string
    {
        return 'nl';
    }

    public static function name(): string
    {
        return 'nederlands';
    }

    public function no(): string
    {
        return 'Nee';
    }

    public function yes(): string
    {
        return 'Ja';
    }
}
