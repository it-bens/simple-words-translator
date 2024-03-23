<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator;

use ITB\SimpleWordsTranslator\Exception\NoTranslationFoundForNameException;

interface TranslatorByNameInterface
{
    /**
     * @throws NoTranslationFoundForNameException
     */
    public function no(string $name): string;

    /**
     * @throws NoTranslationFoundForNameException
     */
    public function yes(string $name): string;
}
