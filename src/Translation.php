<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator;

interface Translation
{
    /**
     * @return non-empty-string
     */
    public static function isoCode(): string;

    /**
     * @return non-empty-string
     */
    public static function name(): string;

    /**
     * @return non-empty-string
     */
    public function no(): string;

    /**
     * @return non-empty-string
     */
    public function yes(): string;
}
