# Devaloka Event Converter
 
[![Latest Stable Version][stable-image]][stable-url]
[![Latest Unstable Version][unstable-image]][unstable-url]
[![License][license-image]][license-url]
[![Build Status][travis-image]][travis-url]

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

[stable-image]: https://poser.pugx.org/devaloka/devaloka-event-converter/v/stable
[stable-url]: https://packagist.org/packages/devaloka/devaloka-event-converter

[unstable-image]: https://poser.pugx.org/devaloka/devaloka-event-converter/v/unstable
[unstable-url]: https://packagist.org/packages/devaloka/devaloka-event-converter

[license-image]: https://poser.pugx.org/devaloka/devaloka-event-converter/license
[license-url]: https://packagist.org/packages/devaloka/devaloka-event-converter

[travis-image]: https://travis-ci.org/devaloka/devaloka-event-converter.svg?branch=master
[travis-url]: https://travis-ci.org/devaloka/devaloka-event-converter
