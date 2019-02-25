> Used [vinkla/hashids](https://github.com/vinkla/laravel-hashids) package to create hash id.

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
$ composer require akr4m/hashid
```

## Configuration

Laravel Hashids requires connection configuration. To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider=akr4m\hashid\HashIdServiceProvider
```

This will create a `config/hashids.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

#### Default Connection Name

This option `default` is where you may specify which of the connections below you wish to use as your default connection for all work. Of course, you may use many connections at once using the manager class. The default value for this setting is `main`.

#### Hashids Connections

This option `connections` is where each of the connections are setup for your application. Example configuration has been included, but you may add as many connections as you would like.

## Usage

To add hash_id field on table in migration file, put this line

```
$table->hashid();
```

Ready to migrate now!!

---

And add some code on models like this

```
use akr4m\hashid\Traits\UsesHashIds;

class abc extends Model
{
    use UsesHashIds;
}
```

### Credits

This package is dedicated to [Alext Garret](https://twitter.com/alexjgarrett)

## License

[MIT](LICENSE) © [AkrAm Khan](https://twitter.com/Akr4mKhan)
