<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator;

use ITB\SimpleWordsTranslator\Exception\NoTranslationFoundForIsoCodeException;
use ITB\SimpleWordsTranslator\Translation\De;
use ITB\SimpleWordsTranslator\Translation\En;

final class TranslatorByIsoCode implements TranslatorByIsoCodeInterface
{
    private readonly array $isoCodeToTranslationMap;

    public function __construct()
    {
        $this->isoCodeToTranslationMap = [
            De::isoCode() => new De(),
            En::isoCode() => new En(),
        ];
    }

    public function no(string $isoCode): string
    {
        $isoCode = strtolower($isoCode);

        if (array_key_exists($isoCode, $this->isoCodeToTranslationMap) === false) {
            throw new NoTranslationFoundForIsoCodeException($isoCode);
        }

        return $this->isoCodeToTranslationMap[$isoCode]->no();
    }

    public function yes(string $isoCode): string
    {
        $isoCode = strtolower($isoCode);

        if (array_key_exists($isoCode, $this->isoCodeToTranslationMap) === false) {
            throw new NoTranslationFoundForIsoCodeException($isoCode);
        }

        return $this->isoCodeToTranslationMap[$isoCode]->yes();
    }
}
