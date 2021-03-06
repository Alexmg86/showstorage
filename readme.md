# ShowStorage

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/Alexmg86/showstorage.svg?branch=master)](https://travis-ci.org/Alexmg86/showstorage)

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

To delete the selected files, you must specify the following method.
``` php
Route::post('/deleteFiles', function (Request $request) {
	ShowStorage::deleteFiles($request->items);
});
```

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Aleksei Morozov][link-author]

## License

license. Please see the [license file](license.md) for more information.

[link-author]: https://github.com/alexmg86
[link-contributors]: ../../contributors
