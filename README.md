# Twig for Glue

Use [twig/twig](https://github.com/twigphp/Twig) with [gluephp/glue](https://github.com/gluephp/glue)

## Installation

Use [Composer](http://getcomposer.org):

```bash
$ composer require gluephp/glue-twig
```

## Configure Twig

```php
$app = new Glue\App;

$app->config->override([
    'twig' => [
        'path'    => '/absolute/path/to/templates/folder',
        'config'  => [
            // Additional Twig config, read Twigs 
            // documentation for more info...
        ]
    ],
]);
```

## Register Twig

```php
$app->register(
    new Glue\Twig\ServiceProvider()
);
```

## Get the Twig instance

Once the service provider is registered, you can fetch the Twig instance with:

```php
$twig = $app->make('Twig_Environment');
```
or use the alias:
```php
$twig = $app->twig;
```
