<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator\Exception;

use Exception;

final class NoTranslationFoundForIsoCodeException extends Exception
{
    public function __construct(string $isoCode)
    {
        parent::__construct(sprintf('No translation found for ISO code %s', $isoCode));
    }
}
