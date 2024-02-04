<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator;

interface TranslatorByIsoCodeInterface
{
    public function no(string $isoCode): string;

    public function yes(string $isoCode): string;
}
