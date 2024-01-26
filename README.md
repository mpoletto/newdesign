<p align="center">
    <h1 align="center">Yii2 PHP Docker Image</h1>
    <br>
</p>

[![Build Status](https://github.com/yiisoft/yii2-docker/actions/workflows/docker-image.yml/badge.svg)](https://github.com/yiisoft/yii2-docker/actions/workflows/docker-image.yml)

This is the repo of the official [Yii 2.0 Framework](http://www.yiiframework.com/) image on [DockerHub](https://hub.docker.com/r/yiisoftware/yii2-php/) for PHP.

## Changed version

Please, to install locally follow the sequence:
1. Clone this repo
2. Run ```docker composer up -d``` from the root of the repo
3. Run ```docker exec -it <container-id> bash``` from the root of the repo
4. cd /app (if not yet there)
5. composer create-project --prefer-dist web yii-application
6. php /caminho/para/aplicacao-yii/init
7. Remove the web folder created on _host-volumes/app from the root of the repo
8. 
9. Run ```composer create-project --prefer-dist yiisoft/yii2-app-basic /app```
10. Run chown -R www-data:www-data /app
11. Your project is ready to run on http://localhost:8101|8102 
12. 
13. You can run http://xdebug.localhost:8101|8102 for debug purposes too

## Most important

This respository is entire based on [YII 2.0 Framework](https://github.com/yiisoft/yii2-docker) and only changes below were made to fit the needs of the test.
1. Code for Yii to work as API
1. Added MySQL Docker image
2. Angular added to work as client to do requests at API
3. Angular code to work as client

The rest of this documentation is from official image at this repository https://github.com/yiisoft/yii2-docker and all credits goes to the original authors.

## About

These Docker images are built on top of the official PHP Docker image, they contain additional PHP extensions required to run Yii 2.0 framework, but no code of the framework itself.
The `Dockerfile`(s) of this repository are designed to build from different PHP-versions by using *build arguments*.

### Available versions for `yiisoftware/yii2-php`

The following images are built on a *weekly* basis for **arm64** and **amd64**. For regular commits on **master** we only build images for **amd64** suffixed with `-latest`/`-latest-min`.

Minimal images

```
8.2-apache-min, 8.2-fpm-min, 8.2-fpm-nginx-min
8.1-apache-min, 8.1-fpm-min, 8.1-fpm-nginx-min
8.0-apache-min, 8.0-fpm-min, 8.0-fpm-nginx-min
```

Development images

```
8.2-apache, 8.2-fpm, 8.2-fpm-nginx
8.1-apache, 8.1-fpm, 8.1-fpm-nginx
8.0-apache, 8.0-fpm, 8.0-fpm-nginx
```

#### Deprecated or EOL versions

```
7.4-*
7.3-*
7.2-*
7.1-*
7.0-*
5.6-*
```

## Setup

    cp .env-dist .env

Adjust the versions in `.env` if you want to build a specific version.

> **Note:** Please make sure to use a matching combination of `DOCKERFILE_FLAVOUR` and `PHP_BASE_IMAGE_VERSION`

## Configuration

- `PHP_ENABLE_XDEBUG` whether to load an enable Xdebug, defaults to `0` (false)  *not available in `-min` images*
- `PHP_USER_ID` (Debian only) user ID, when running commands as webserver (`www-data`), see also [#15](https://github.com/yiisoft/yii2-docker/issues/15)

## Building

    docker-compose build

## Testing

    docker-compose run --rm php php /tests/requirements.php

### Xdebug

To enable Xdebug, set `PHP_ENABLE_XDEBUG=1` in .env file

Xdebug is configured to call ip `xdebug.remote_host` on `9005` port (not use standard port to avoid conflicts),
so you have to configure your IDE to receive connections from that ip.

## Documentation

More information can be found in the [docs](/docs) folder.

## FAQ

- We do not officially support Alpine images, due to numerous issues with PHP requirements and because framework tests are not passing.
- Depending on the (Debian) base-image (usually PHP <7.4) you might need to set `X_LEGACY_GD_LIB=1`
- test
