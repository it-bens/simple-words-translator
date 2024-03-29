<?php

declare(strict_types=1);

namespace ITB\SimpleWordsTranslator\Tests;

use Generator;
use ITB\SimpleWordsTranslator\Exception\NoTranslationFoundForNameException;
use ITB\SimpleWordsTranslator\TranslatorByName;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class TranslatorByNameTest extends TestCase
{
    public static function noProvider(): Generator
    {
        $translator = new TranslatorByName();

        yield '"deutsch"' => [$translator, 'deutsch', 'Nein'];
        yield '"Deutsch"' => [$translator, 'Deutsch', 'Nein'];
        yield '"english"' => [$translator, 'english', 'No'];
        yield '"English"' => [$translator, 'english', 'No'];
        yield '"français"' => [$translator, 'français', 'Non'];
        yield '"Français"' => [$translator, 'Français', 'Non'];
        yield '"español"' => [$translator, 'español', 'No'];
        yield '"Español"' => [$translator, 'Español', 'No'];
        yield '"italiano"' => [$translator, 'italiano', 'No'];
        yield '"Italiano"' => [$translator, 'Italiano', 'No'];
        yield '"nederlands"' => [$translator, 'nederlands', 'Nee'];
        yield '"Nederlands"' => [$translator, 'Nederlands', 'Nee'];
    }

    public static function noThrowsExceptionWhenNoTranslationFoundProvider(): Generator
    {
        $translator = new TranslatorByName();

        yield 'empty string' => [$translator, ''];
        yield 'random string' => [$translator, 'random'];
    }

    public static function yesProvider(): Generator
    {
        $translator = new TranslatorByName();

        yield '"deutsch"' => [$translator, 'deutsch', 'Ja'];
        yield '"Deutsch"' => [$translator, 'Deutsch', 'Ja'];
        yield '"english"' => [$translator, 'english', 'Yes'];
        yield '"English"' => [$translator, 'English', 'Yes'];
        yield '"français"' => [$translator, 'français', 'Oui'];
        yield '"Français"' => [$translator, 'Français', 'Oui'];
        yield '"español"' => [$translator, 'español', 'Sí'];
        yield '"Español"' => [$translator, 'Español', 'Sí'];
        yield '"italiano"' => [$translator, 'italiano', 'Sì'];
        yield '"Italiano"' => [$translator, 'Italiano', 'Sì'];
        yield '"nederlands"' => [$translator, 'nederlands', 'Ja'];
        yield '"Nederlands"' => [$translator, 'Nederlands', 'Ja'];
    }

    public static function yesThrowsExceptionWhenNoTranslationFoundProvider(): Generator
    {
        $translator = new TranslatorByName();

        yield 'empty string' => [$translator, ''];
        yield 'random string' => [$translator, 'random'];
    }

    public function testConstructor(): void
    {
        $translator = new TranslatorByName();
        $this->assertInstanceOf(TranslatorByName::class, $translator);
    }

    #[DataProvider('noProvider')]
    public function testNo(TranslatorByName $translator, string $languageName, string $expectedTranslation): void
    {
        $translation = $translator->no($languageName);

        $this->assertSame($expectedTranslation, $translation);
    }

    #[DataProvider('noThrowsExceptionWhenNoTranslationFoundProvider')]
    public function testNoThrowsExceptionWhenNoTranslationFound(TranslatorByName $translator, string $languageName): void
    {
        $this->expectException(NoTranslationFoundForNameException::class);

        $translator->no($languageName);
    }

    #[DataProvider('yesProvider')]
    public function testYes(TranslatorByName $translator, string $languageName, string $expectedTranslation): void
    {
        $translation = $translator->yes($languageName);

        $this->assertSame($expectedTranslation, $translation);
    }

    #[DataProvider('yesThrowsExceptionWhenNoTranslationFoundProvider')]
    public function testYesThrowsExceptionWhenNoTranslationFound(TranslatorByName $translator, string $languageName): void
    {
        $this->expectException(NoTranslationFoundForNameException::class);

        $translator->yes($languageName);
    }
}
