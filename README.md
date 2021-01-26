# export-gmail-contacts

[![Latest Version on Packagist](https://img.shields.io/packagist/v/minhajul/export-gmail-contacts.svg?style=flat-square)](https://packagist.org/packages/minhajul/export-gmail-contacts)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/minhajul/export-gmail-contacts/run-tests?label=tests)](https://github.com/minhajul/export-gmail-contacts/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/minhajul/export-gmail-contacts.svg?style=flat-square)](https://packagist.org/packages/minhajul/export-gmail-contacts)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/package-export-gmail-contacts-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/package-export-gmail-contacts-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require minhajul/export-gmail-contacts
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Minhajul\ExportGmailContacts\ExportGmailContactsServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Minhajul\ExportGmailContacts\ExportGmailContactsServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$export-gmail-contacts = new Minhajul\ExportGmailContacts();
echo $export-gmail-contacts->echoPhrase('Hello, Minhajul!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Md Minhajul Islam](https://github.com/minhajul)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
