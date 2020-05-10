# bitfinex-api
[![Build Status](https://travis-ci.com/codenix-sv/bitfinex-api.svg?branch=master)](https://travis-ci.com/codenix-sv/bitfinex-api)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/codenix-sv/bitfinex-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/codenix-sv/bitfinex-api/?branch=master)
[![License: MIT](https://img.shields.io/github/license/codenix-sv/bitfinex-api)](https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE)
[![Packagist](https://img.shields.io/packagist/dt/codenix-sv/bitfinex-api)](https://packagist.org/packages/codenix-sv/bitfinex-api)

A simple PHP wrapper for [Bitfinex API](https://docs.bitfinex.com/docs/rest-general). [Bitfinex](https://www.bitfinex.com) The world's largest and most advanced cryptocurrency trading platform

Pay attention to the [WebSocket client in PHP for the Bitfinex API](https://github.com/codenix-sv/bitfinex-api-ws)

## Requirements

* PHP >= 7.2
* ext-json
* [Bitfinex](https://www.bitfinex.com), API key and API secret

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require codenix-sv/bitfinex-api
```
or add

```json
"codenix-sv/bitfinex-api" : "^1.0"
```

to the require section of your application's `composer.json` file.

## Basic usage

### Example
```php
use Codenixsv\BitfinexApi\BitfinexClient;

$client = new BitfinexClient();
$data = $client->public()->getPlatformStatus();
```
## Available methods

### Public API

#### getPlatformStatus
Get the current status of the platform, “Operative” or “Maintenance” (1=operative, 0=maintenance). Maintenance periods generally last for a 
few minutes to a couple of hours and may be necessary from time to time during infrastructure upgrades.

```php
$data = $client->public()->getPlatformStatus();
```

#### getTickers
The tickers endpoint provides a high level overview of the state of the market. It shows the current best bid and ask,
the last traded price, as well as information on the daily volume and price movement over the last day. The endpoint can retrieve multiple tickers with a single query.
```php
$data = $client->public()->getTickers('tBTCUSD,tLTCUSD,fUSD');
```

#### getTicker
The ticker endpoint provides a high level overview of the state of the market for a specified pair. It shows the current
best bid and ask, the last traded price, as well as information on the daily volume and price movement over the last day.
```php
$data = $client->public()->getTicker('tBTCUSD');
```

#### getTrades
The trades endpoint allows the retrieval of past public trades and includes details such as price, size, and time. 
Optional parameters can be used to limit the number of results; you can specify a start and end timestamp, a limit, and a sorting method.
```php
$data = $client->public()->getTrades('tBTCUSD', ['limit' => 100]);
```

#### getBook
The Public Books endpoint allows you to keep track of the state of Bitfinex order books on a price aggregated basis with
customizable precision. Raw books can be retrieved by using precision `R0`. 
```php
$data = $client->public()->getBook('tBTCUSD', 'P0');
```

#### getStats
The Stats endpoint provides various statistics on a specified trading pair or funding currency. Use the available keys 
to specify which statistic you wish to retrieve.

Use `side` param only for non-funding queries.
```php
$data = $client->public()->getStats('pos.size', '1m', 'tBTCUSD', 'hist', 'long');
$data = $client->public()->getStats('funding.size', '1m', 'fUSD', 'hist');
```

#### getCandles
The Candles endpoint provides OCHL (Open, Close, High, Low) and volume data for the specified funding currency or trading pair.
Funding period required only for funding candles.
```php
$data = $client->public()->getCandles('1m', 'tBTCUSD', 'hist');
$data = $client->public()->getCandles('1m', 'fUSD', 'hist', 'p30');
```

#### getConfigs
Fetch currency and symbol site configuration data.
A variety of types of config data can be fetched by constructing a path with an Action, Object, and conditionally a Detail value.
```php
$data = $client->public()->getConfigs('list', 'pair', 'exchange');
```

#### getStatus
Endpoint used to receive different types of platform information - currently supports derivatives pair status only.
```php
$data = $client->public()->getStatus('deriv', ['keys' => 'tBTCF0:USTF0']);
$data = $client->public()->getStatus('deriv/tBTCF0:USTF0/hist', ['start' => 157057800000, 'end' => 1573566992000]);
```

#### getLiquidationFeed
Endpoint to retrieve liquidations. By default it will retrieve the most recent liquidations, but time-specific data can be retrieved using timestamps.
```php
$data = $client->public()->getLiquidationFeed();
```

#### getLeaderboards
The leaderboards endpoint allows you to retrieve leaderboard standings for unrealized profit (period delta), unrealized profit (inception), volume, and realized profit.
```php
$data = $client->public()->getLeaderboards('vol', '3h', 'tBTCUSD', 'hist');
```

## Further Information
Please, check the [Bitfinex site](https://docs.bitfinex.com/docs/rest-general) documentation for further
information about API.

## License

`codenix-sv/bitfinex-api` is released under the MIT License. See the bundled [LICENSE](./LICENSE) for details.
