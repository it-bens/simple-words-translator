<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator;

use ITB\SimpleWordsTranslator\Exception\NoTranslationFoundForNameException;
use ITB\SimpleWordsTranslator\Translation\De;
use ITB\SimpleWordsTranslator\Translation\En;
use ITB\SimpleWordsTranslator\Translation\Es;
use ITB\SimpleWordsTranslator\Translation\Fr;
use ITB\SimpleWordsTranslator\Translation\It;
use ITB\SimpleWordsTranslator\Translation\Nl;

final class TranslatorByName implements TranslatorByNameInterface
{
    private readonly array $nameToTranslationMap;

    public function __construct()
    {
        $this->nameToTranslationMap = [
            De::name() => new De(),
            En::name() => new En(),
            Es::name() => new Es(),
            Fr::name() => new Fr(),
            It::name() => new It(),
            Nl::name() => new Nl(),
        ];
    }

    public function no(string $name): string
    {
        $name = strtolower($name);

        if (array_key_exists($name, $this->nameToTranslationMap) === false) {
            throw new NoTranslationFoundForNameException($name);
        }

        return $this->nameToTranslationMap[$name]->no();
    }

    public function yes(string $name): string
    {
        $name = strtolower($name);

        if (array_key_exists($name, $this->nameToTranslationMap) === false) {
            throw new NoTranslationFoundForNameException($name);
        }

        return $this->nameToTranslationMap[$name]->yes();
    }
}
