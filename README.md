# A package to get list of countries

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kenyalang/countries.svg?style=flat-square)](https://packagist.org/packages/kenyalang/countries)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kenyalang/countries/run-tests?label=tests)](https://github.com/kenyalang/countries/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/kenyalang/countries/Check%20&%20fix%20styling?label=code%20style)](https://github.com/kenyalang/countries/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kenyalang/countries.svg?style=flat-square)](https://packagist.org/packages/kenyalang/countries)

## Installation

You can install the package via composer:

```bash
composer require kenyalang/countries
```

## Usage
Run the migrations to create and populate the `countries` and `states` table.

```php
php artisan migrate
```

By default, the `countries` will be inactive. You will need to manually activate them.

```php
\Kenyalang\Countries\Models\Country::whereName('United States')->first()->activate();
```

Add the following trait to your model to use the `countries` and `states` table:

```php
class User extends Model
{
    use \Kenyalang\Countries\Traits\HasCountry;
}
```

To get the locale of a model use the `withLocale` scope:

```php
User::withLocale()->first();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Scalia Abel](https://github.com/scaabel)
- [Drahan](https://github.com/dr5hn)

The list of countries was taken from [here](https://github.com/dr5hn/countries-states-cities-database). Do check it out.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
