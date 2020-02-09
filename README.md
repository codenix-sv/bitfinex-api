# bitfinex-api
A simple PHP wrapper for [Bitfinex API](https://docs.bitfinex.com/docs). [Bitfinex](https://www.bitfinex.com) The world's largest and most advanced cryptocurrency trading platform
## Requirements

- PHP >= 7.1

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require codenix-sv/bitfinex-api:~0.2
```
or add

```json
"codenix-sv/bitfinex-api" : "~0.2"
```

to the require section of your application's `composer.json` file.

## Basic usage

### Example
```php
use codenixsv\Bitfinex\BitfinexManager;

$manager = new BitfinexManager();
$client = $manager->createClient();

$responce = $client->getTicker('btcusd');
```
### Available methods

#### Public API

##### Get ticker
```php
$responce = $client->getTicker('btcusd');
```
##### Various statistics about the requested pair.
```php
$responce = $client->getStats('btcusd');
```
##### Get the full margin funding book.
```php
$responce = $client->getFundingBook('usd');
```
##### Get the full order book..
```php
$responce = $client->getOrderBook('btcusd');
```
##### Get a list of the most recent trades for the given symbol.
```php
$responce = $client->getTrades('btcusd');
```
##### Get a list of the most recent funding data for the given currency: total amount provided and Flash Return Rate (in % by 365 days) over time.
```php
$responce = $client->getLends('usd');
```
##### Get a list of symbol names.
```php
$responce = $client->getSymbols();
```
##### Get a list of valid symbol IDs and the pair details.
```php
$responce = $client->getSymbolsDetails();
```