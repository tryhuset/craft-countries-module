# CLAUDE.md

Guidance for Claude Code when working in this repository.

## Local development runs in DDEV

This project is developed and tested locally inside **DDEV**. Do not run
PHP/Composer commands directly on the host — run them through DDEV so the
correct PHP version and dependencies are used.

```bash
ddev start
ddev composer install
ddev composer update
ddev exec php <command>
```

The DDEV environment (see `.ddev/config.yaml`) uses PHP 8.3 and MariaDB, which
matches the runtime requirements for Craft CMS 5.

## Project overview

`apt/craft-countries-module` is a Craft CMS module that exposes a list of
countries to Twig templates and PHP. Source lives in `src/`:

- `CraftCountriesModule.php` — module bootstrap, registers the `countries`
  Craft variable.
- `services/Service.php` — service wrapping the country data.
- `utils/Countries.php` — the country code → name data set.
- `models/Country.php` — country model with validation.
- `variables/CraftCountriesModuleVariable.php` — `craft.countries` Twig API.
- `validators/CountryValidator.php` — validates ISO country codes.

## Requirements

- Craft CMS 5 (`craftcms/cms: ^5.0`)
- PHP 8.2+

## Releases

Versioning follows SemVer. Update `composer.json` `version` and `CHANGELOG.md`,
then tag the release (`vX.Y.Z`) and push the tag to GitLab
(`git1.apt.no/open/craft-countries-module`).
