<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator;

use ITB\SimpleWordsTranslator\Exception\NoTranslationFoundForIsoCodeException;

interface TranslatorByIsoCodeInterface
{
    /**
     * @throws NoTranslationFoundForIsoCodeException
     */
    public function no(string $isoCode): string;

    /**
     * @throws NoTranslationFoundForIsoCodeException
     */
    public function yes(string $isoCode): string;
}
