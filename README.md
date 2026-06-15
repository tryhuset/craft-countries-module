# Craft Countries Module module for Craft CMS 5.x

Add list of countries

## Requirements

This module requires Craft CMS 5.0.0 or later and PHP 8.2 or later.

## Installation

To install the module, follow these instructions.

First add repo to your composer.json
```
...
"repositories": [
  ...
  {
    "type": "vcs",
    "url": "https://git1.apt.no/open/craft-countries-module.git"
  }
],
...
```

```
composer require apt/craft-countries-module
```

First, you'll need to add the contents of the `app.php` file to your `config/app.php` (or just copy it there if it does not exist). This ensures that your module will get loaded for each request. The file might look something like this:
```
return [
    'modules' => [
        'craft-countries-module' => [
            'class' => \modules\craftcountriesmodule\CraftCountriesModule::class,
            'components' => [
                'service' => [
                    'class' => 'modules\craftcountriesmodule\services\Service',
                ],
            ],
        ],
    ],
    'bootstrap' => ['craft-countries-module'],
];
```
You'll also need to make sure that you add the following to your project's `composer.json` file so that Composer can find your module:

    "autoload": {
        "psr-4": {
          "modules\\craftcountriesmodule\\": "modules/craftcountriesmodule/src/"
        }
    },

After you have added this, you will need to do:

    composer dump-autoload

 …from the project’s root directory, to rebuild the Composer autoload map. This will happen automatically any time you do a `composer install` or `composer update` as well.

## Using Craft Countries Module

### Twig:

#### List all countries
```
{% for country in craft.countries.list %}
  {{ country.code }}
  {{ country.name }}
{% endfor %}
```
#### Get country by code
```
{% set country = craft.countries.get('NO') %}
code: {{ country.code }}
name: {{ country.name }}
```

### PHP

#### List all countries
```
$countries = Craft::$app->getModule('countries')->service->getCountries();
foreach($countries as $country) {
  echo $country->code;
  echo $country->name;
}
```
#### Get country by code
```
$countries = Craft::$app->getModule('countries')->service->getCountryCode('NO');
echo $country->name;
```

Brought to you by [Thomas Sømoen](https://apt.no/)
