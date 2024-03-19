<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator\Tests;

use Generator;
use ITB\SimpleWordsTranslator\Exception\NoTranslationFoundForIsoCodeException;
use ITB\SimpleWordsTranslator\TranslatorByIsoCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class TranslatorByIsoCodeTest extends TestCase
{
    public static function noProvider(): Generator
    {
        $translator = new TranslatorByIsoCode();

        yield '"de"' => [$translator, 'de', 'Nein'];
        yield '"De"' => [$translator, 'De', 'Nein'];
        yield '"en"' => [$translator, 'en', 'No'];
        yield '"En"' => [$translator, 'En', 'No'];
    }

    public static function noThrowsExceptionWhenNoTranslationFoundProvider(): Generator
    {
        $translator = new TranslatorByIsoCode();

        yield 'empty string' => [$translator, ''];
        yield 'random string' => [$translator, 'random'];
    }

    public static function yesProvider(): Generator
    {
        $translator = new TranslatorByIsoCode();

        yield '"de"' => [$translator, 'de', 'Ja'];
        yield '"De"' => [$translator, 'De', 'Ja'];
        yield '"en"' => [$translator, 'en', 'Yes'];
        yield '"En"' => [$translator, 'En', 'Yes'];
    }

    public static function yesThrowsExceptionWhenNoTranslationFoundProvider(): Generator
    {
        $translator = new TranslatorByIsoCode();

        yield 'empty string' => [$translator, ''];
        yield 'random string' => [$translator, 'random'];
    }

    public function testConstructor(): void
    {
        $translator = new TranslatorByIsoCode();
        $this->assertInstanceOf(TranslatorByIsoCode::class, $translator);
    }

    #[DataProvider('noProvider')]
    public function testNo(TranslatorByIsoCode $translator, string $languageIsoCode, string $expectedTranslation): void
    {
        $translation = $translator->no($languageIsoCode);

        $this->assertSame($expectedTranslation, $translation);
    }

    #[DataProvider('noThrowsExceptionWhenNoTranslationFoundProvider')]
    public function testNoThrowsExceptionWhenNoTranslationFound(TranslatorByIsoCode $translator, string $languageIsoCode): void
    {
        $this->expectException(NoTranslationFoundForIsoCodeException::class);

        $translator->no($languageIsoCode);
    }

    #[DataProvider('yesProvider')]
    public function testYes(TranslatorByIsoCode $translator, string $languageIsoCode, string $expectedTranslation): void
    {
        $translation = $translator->yes($languageIsoCode);

        $this->assertSame($expectedTranslation, $translation);
    }

    #[DataProvider('yesThrowsExceptionWhenNoTranslationFoundProvider')]
    public function testYesThrowsExceptionWhenNoTranslationFound(TranslatorByIsoCode $translator, string $languageIsoCode): void
    {
        $this->expectException(NoTranslationFoundForIsoCodeException::class);

        $translator->yes($languageIsoCode);
    }
}
