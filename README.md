# Export Gmail Contacts

If you want to get user's contacts attached with gmail, this package will save your time a lot.

## Installation

You can install the package via composer:

```bash
composer require minhajul/export-gmail-contacts
```

You can publish and run the config file by running the below command:

```bash
php artisan vendor:publish --provider="Minhajul\ExportGmailContacts\ExportGmailContactsServiceProvider" --tag="config"
```

## Usage


```php
use Minhajul\ExportGmailContacts\ExportContacts;

Route::get('your-url', function () {
    // This will redirect you to the gmail callback url 
    return ExportContacts::initiate();
});
 
Route::get('your-gmail-callback-url', function () {
    // This below code will return you the array of contacts you have saved in your gmail
    return ExportContacts::getContacts();
});
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Md Minhajul Islam](https://github.com/minhajul)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
