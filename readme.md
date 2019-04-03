# ShowStorage

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require alexmg86/showstorage
```

## Usage

To get all files from some folder. If you do not specify an explicit path, storage_path ('app') will be processed.
``` php
$files = ShowStorage::getFiles($path);
```

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Aleksei Morozov][link-author]

## License

license. Please see the [license file](license.md) for more information.

[link-author]: https://github.com/alexmg86
[link-contributors]: ../../contributors
