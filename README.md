# Call of Duty League Stats API

A PHP API for retrieving match statistics for Call of Duty League matches.

## Installation

For now, you will need to clone the repo. This will be added to Packagist in the neat future.

## Usage

```php
require 'vendor/autoload.php';

$client = new Tustin\CodLeague\Client();

$match = $client->match(8719);

foreach ($match->players() as $player) {
    echo $player->alias() . ' - ' . $player->kd() . PHP_EOL;
}
```

```
Clayster - 1.12
Temp - 1.13
TJHaLy - 0.89
2ReaL - 1.12
Kenny - 0.88
Octane - 0.92
Envoy - 0.92
Drazah - 1.04
```
