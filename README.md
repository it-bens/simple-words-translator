# Simple Words Translator

A simple problem with a simple solution. 

This is a simple package that provides translations for defined words like "yes" and "no" (in english). The desired language can be passed by name or or ISO code (2 letter).

## Installation

```bash
composer require it-bens/simple-words-translator
```

## Usage

```php
use ITB\SimpleWordsTranslator\TranslatorByName;

$translator = new TranslatorByName();
$translation = $translator->yes('Deutsch'); // 'Ja'
$translation = $translator->no('deutsch'); // 'Nein'
```

```php
use ITB\SimpleWordsTranslator\TranslatorByIsoCode;

$translator = new TranslatorByIsoCode();
$translation = $translator->yes('de'); // 'Ja'
$translation = $translator->no('de'); // 'Nein'
```

The package provides interfaces for the two translators. All translations implement the `ITB\SimpleWordsTranslator\Translation` interface.

## Supported Languages

* German
* English