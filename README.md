# Nova List Card

[![Latest Stable Version](https://poser.pugx.org/thijssimonis/nova-list-card/v)](//packagist.org/packages/thijssimonis/nova-list-card) [![Total Downloads](https://poser.pugx.org/thijssimonis/nova-list-card/downloads)](//packagist.org/packages/thijssimonis/nova-list-card) [![License](https://poser.pugx.org/thijssimonis/nova-list-card/license)](//packagist.org/packages/thijssimonis/nova-list-card)

List rows in a table card. For example the 5 latest users.

![screenshot01](docs/screenshot01.png)

## Installation

You can install the package in any app running [Laravel Nova](https://nova.laravel.com):

```bash
composer require thijssimonis/nova-list-card
```

## Usage

## Card
```php
<?php

namespace App\Nova\Metrics;

use App\User;
use ThijsSimonis\NovaListCard\NovaListCard;

class LatestUsers extends NovaListCard
{
    public $width = '1/2';

    public function __construct()
    {
        parent::__construct();

        $this->rows(User::select(['id', 'name'])->orderBy('created_at', 'DESC')->limit(5)->get()->map(function ($row) {
            $row['view'] = config('nova.path') . '/resources/users/' . $row['id'];
            return $row;
        })));
    }

    public function uriKey(): string
    {
        return 'latest-users';
    }
}
```

## Inline

```php
<?php

use App\User;
use ThijsSimonis\NovaListCard\NovaListCard;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    protected function cards(): array
    {
        return [
            (new NovaListCard())
                ->title(__('5 latest users'))
                ->rows(User::select('id', 'name')->orderBy('created_at', 'DESC')->limit(5)->get()),
        ];
    }
}
```

## Inline with heading

```php
<?php

use App\User;
use ThijsSimonis\NovaListCard\NovaListCard;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    protected function cards(): array
    {
        return [
            (new NovaListCard())
                ->title(__('5 latest users'))
                ->heads([__('ID'), __('Name'))
                ->rows(User::select('id', 'name')->orderBy('created_at', 'DESC')->limit(5)->get()),
        ];
    }
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [Thijs Simonis](https://github.com/thijssimonis)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
