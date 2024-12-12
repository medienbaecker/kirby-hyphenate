<?php

@include_once __DIR__ . '/vendor/autoload.php';

use Kirby\Cms\App as Kirby;
use Vanderlee\Syllable\Syllable;

Syllable::setCacheDir(kirby()->root('cache'));

Kirby::plugin('medienbaecker/hyphenate', [
  'options' => [
    'minWordLength' => 10,
    'language' => function () {
      return kirby()->language() ? kirby()->language()->code() : 'en';
    }
  ],
  'hooks' => [
    'kirbytext:after' => function (string|null $text) {
      $syllable = new Syllable(option('medienbaecker.hyphenate.language'));
      $syllable->setMinWordLength(option('medienbaecker.hyphenate.minWordLength'));

      return $syllable->hyphenateText($text);
    }
  ]
]);
