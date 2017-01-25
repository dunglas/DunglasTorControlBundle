DunglasTorControlBundle, TorControl Symfony integration
=======================================================

Use the [PHP TorControl library](http://dunglas.fr/2013/02/php-torcontrol-a-library-to-control-tor/) with [Symfony](http://symfony.com).
TorControl allows to control a [Tor](https://www.torproject.org/) server.

[![Build Status](https://travis-ci.org/dunglas/DunglasTorControlBundle.svg?branch=master)](https://travis-ci.org/dunglas/DunglasTorControlBundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9a29e632-8500-4b48-92ee-d33595410d8b/mini.png)](https://insight.sensiolabs.com/projects/9a29e632-8500-4b48-92ee-d33595410d8b)
[![StyleCI](https://styleci.io/repos/8615630/shield?branch=master)](https://styleci.io/repos/8615630)

Installation
------------

Use [Composer](http://getcomposer.org/) to install this bundle:

    composer require dunglas/torcontrol-bundle

Add the bundle to the application kernel:

```php
$bundles = array(
    // ...
    new Dunglas\TorControlBundle\DunglasTorControlBundle(),
);
```

Configuration
-------------

```yaml
# app/config/config.yml
dunglas_tor_control:
    # Hostname or IP of the Tor server (default to localhost)
    hostname: ~
    # Port (default to 9051)
    port: ~
    # "null" for no authentication, "password" for password auth, "cookie" for cookie file auth (default to autodetect)
    authmethod: "null"
    # Password to use if the password auth method is used (no default)
    password: ~
    # Cookie file is this auth method is used (no default)
    cookiefile: ~
    # Connection timeout (default to php.ini setting)
    timeout: ~
```

Usage
-----

```php
// Get an instance of the PHP TorControl library as a service
$tc = $this->get('torcontrol');
```

Credits
-------

This bundle has been written by [Kévin Dunglas](http://dunglas.fr).
