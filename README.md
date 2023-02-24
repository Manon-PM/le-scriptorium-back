# Scriptorium

Scriptorium is an application that will easily guide a player through the process of creating a character for the "Chroniques oubliées" french role-playing game. This application will allow the player to generate his character sheet in PDF format.

## Development environment :

### Technical specifications:

PHP 7.4
Composer
BDD MySQL

### Project launch commands :

```bash
composer create-project symfony/skeleton oflix
composer require annotations
composer require twig
composer require --dev symfony/var-dumper
composer require --dev symfony/profiler-pack
composer require --dev symfony/debug-bundle
composer require symfony/asset
composer require maker
composer require symfony/orm-pack
composer require --dev orm-fixtures
composer require symfony/validator
composer require security-csrf ???
composer require symfony/security-bundle
composer require serializer
```

### Commands to execute when importing the project on a local machine in -dev mode :

Create .env.local file

```bash
composer install
bin/console doctrine:database:create scriptorium
bin/console doctrine:migrations:migrate
bin/console doctrine:fixtures:load
bin/console lexik:jwt:generate-keypair
```

## API routes list :



| Endpoint| HTTP  | Description| Return|
| ------------------------- | ------------ | --------------------------------------------------------------------------------------------- | ----------------------- |
| `/api/classes`| `GET`| retrieve all classes and their infos| 200|
| `/api/races`| `GET`| retrieve all races and their infos| 200|
| `/api/ways`| `GET`| retrieve all ways and their infos| 200|
| `/api/character/id`| `GET`| retrieve All information from the saved character sheet| 200|
| `/api/stats`| `GET`| retrieve all stats (name, description)| 200|
| `/api/generator`| `POST`| All information from the completed character sheet + generation of the pdf + caching| 200|
| `/api/religions`| `GET`| retrieve all religions and their infos| 200|
| `/api/characters`| `POST`| Allows saving from the generated cache on the /api/generator route| 200|
