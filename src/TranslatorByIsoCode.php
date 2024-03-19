<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator;

use ITB\SimpleWordsTranslator\Exception\NoTranslationFoundForIsoCodeException;
use ITB\SimpleWordsTranslator\Translation\De;
use ITB\SimpleWordsTranslator\Translation\En;
use ITB\SimpleWordsTranslator\Translation\Es;
use ITB\SimpleWordsTranslator\Translation\Fr;
use ITB\SimpleWordsTranslator\Translation\It;
use ITB\SimpleWordsTranslator\Translation\Nl;

final class TranslatorByIsoCode implements TranslatorByIsoCodeInterface
{
    private readonly array $isoCodeToTranslationMap;

    public function __construct()
    {
        $this->isoCodeToTranslationMap = [
            De::isoCode() => new De(),
            En::isoCode() => new En(),
            Es::isoCode() => new Es(),
            Fr::isoCode() => new Fr(),
            It::isoCode() => new It(),
            Nl::isoCode() => new Nl(),
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
