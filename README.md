# Devaloka Event Converter [![Build Status][travis-image]][travis-url] [![Packagist][packagist-image]][packagist-url]

A WordPress plugin that interchangeably converts WordPress's action/filter
to/from [EventDispatcher](https://github.com/devaloka/devaloka)'s Event.

## Features

*   Interchangeably handle/listen/dispatch **all** WordPress actions/filters
    as EventDispatcher's Events

    *   WordPress's action/filter to WordPress's action/filter
    *   WordPress's action/filter to EventDispatcher's Event
    *   EventDispatcher's Event to WordPress's action/filter
    *   EventDispatcher's Event to EventDispatcher's Event

## Requirements

*   [Devaloka](https://github.com/devaloka/devaloka)

## Installation

1.  Install via Composer.

    ```sh
    composer require devaloka/devaloka-event-converter
    ```

## Caveat

*   `Event::stopPropagation()` doesn't work.

[travis-image]: https://travis-ci.org/devaloka/devaloka-event-converter.svg?branch=master
[travis-url]: https://travis-ci.org/devaloka/devaloka-event-converter

[packagist-image]: https://img.shields.io/packagist/v/devaloka/devaloka-event-converter.svg
[packagist-url]: https://packagist.org/packages/devaloka/devaloka-event-converter
