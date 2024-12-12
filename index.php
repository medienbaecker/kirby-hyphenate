<?php

@include_once __DIR__ . '/vendor/autoload.php';

use Kirby\Cms\App as Kirby;
use Kirby\Toolkit\Str;
use Vanderlee\Syllable\Syllable;

Syllable::setCacheDir(kirby()->root('cache'));

Kirby::plugin('medienbaecker/hyphenate', [
  'options' => [
    'minWordLength' => 10,
    'language' => Str::replace(kirby()->language()->locale()[0], '_', '-') ?? 'en-gb'
  ],
  'hooks' => [
    'kirbytext:after' => function (string|null $text) {

      $syllable = new Syllable(option('medienbaecker.hyphenate.language'));
      $syllable->setMinWordLength(option('medienbaecker.hyphenate.minWordLength'));

      return $syllable->hyphenateText($text);
    }
  ]
]);
