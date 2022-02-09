## Blueprint Macro

Extending [available column types](https://laravel.com/docs/5.6/migrations#creating-columns) in Laravel Migrations.

[![Check & fix styling](https://github.com/cleaniquecoders/blueprint-macro/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/cleaniquecoders/blueprint-macro/actions/workflows/php-cs-fixer.yml) [![PHPStan](https://github.com/cleaniquecoders/blueprint-macro/actions/workflows/phpstan.yml/badge.svg)](https://github.com/cleaniquecoders/blueprint-macro/actions/workflows/phpstan.yml) [![Latest Stable Version](https://poser.pugx.org/cleaniquecoders/blueprint-macro/version)](https://packagist.org/packages/cleaniquecoders/blueprint-macro) [![Total Downloads](https://poser.pugx.org/cleaniquecoders/blueprint-macro/downloads)](https://packagist.org/packages/cleaniquecoders/blueprint-macro) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/cleaniquecoders/blueprint-macro/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/cleaniquecoders/blueprint-macro/?branch=master) [![License](https://poser.pugx.org/cleaniquecoders/blueprint-macro/license)](https://packagist.org/packages/cleaniquecoders/blueprint-macro)

## Installation

In order to install Blueprint Macro in your Laravel project:

```
$ composer require cleaniquecoders/blueprint-macro
```

You can skip following steps if you are on Laravel 5.5 and above.

In your `config/app.php` add the following to the `providers` key:

```php
CleaniqueCoders\Blueprint\Macro\BlueprintMacroServiceProvider::class,
```

## Usage

See [wiki](https://github.com/cleaniquecoders/blueprint-macro/wiki/Available-Blueprint-Macros) for more details.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).