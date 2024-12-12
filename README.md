# Kirby Hyphenate

A Kirby plugin that automatically adds soft hyphens to long words using the [PHP Syllable library](https://github.com/vanderlee/phpSyllable).

## Usage

The plugin automatically adds soft hyphens (`&shy;`) to long words in your Kirbytext content.

### How it works

- Uses the PHP Syllable library to detect proper hyphenation points
- Only hyphenates words longer than the specified minimum length (default: 10 characters)
- Currently set to German language
- Soft hyphens only show up when needed (words break at these points only if necessary)
- Works with Kirby's cache system

## Configuration

You can configure the plugin in your `config.php`:

```php
return [

  // Change 10 to your preferred length
  'medienbaecker.hyphenate.minWordLength' => 10,

  // Override automatic language detection
  'medienbaecker.hyphenate.language' => 'de'

];
```
