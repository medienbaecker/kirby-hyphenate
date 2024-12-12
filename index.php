<?php

@include_once __DIR__ . '/vendor/autoload.php';

use Kirby\Cms\App as Kirby;
use Vanderlee\Syllable\Syllable;

Syllable::setCacheDir(kirby()->root('cache'));

Kirby::plugin('medienbaecker/hyphenate', [
  'hooks' => [
    'kirbytext:after' => function (string|null $text) {

      $syllable = new Syllable('de');
      $syllable->setMinWordLength(10);

      return $syllable->hyphenateText($text);

    }
  ]
]);
