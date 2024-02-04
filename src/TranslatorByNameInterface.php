<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator;

interface TranslatorByNameInterface
{
    public function no(string $name): string;

    public function yes(string $name): string;
}
