<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator\Translation;

use ITB\SimpleWordsTranslator\Translation;

final class Fr implements Translation
{
    public static function isoCode(): string
    {
        return 'fr';
    }

    public static function name(): string
    {
        return 'français';
    }

    public function no(): string
    {
        return 'Non';
    }

    public function yes(): string
    {
        return 'Oui';
    }
}
