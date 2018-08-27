# Monk Blog


## Install

- Clone this repository

```shell
$ git clone https://github.com/eesnaola/monk-blog
```

- Install dependencies

```shell
$ composer install
```

#### Database

To create the configured database run:
```sh 
php bin/console doctrine:database:create
``` 
To execute (or dump) the SQL needed to update the database schema to match the current mapping metadata
```sh 
php bin/console doctrine:schema:update --force
```

#### Compiling assets 

First, make sure you [install Node.js](https://nodejs.org/en/download/) and also the [Yarn package manager](https://yarnpkg.com/lang/en/docs/install/). Then run:
```sh
yarn install
```
To compile for first time run: 
```sh
yarn run encore dev
```

#### Configuring a Web Server

https://symfony.com/doc/current/setup/web_server_configuration.html

To use the login with auth0 it is necessary to edit the hosts file and use the alias blog.mediamonks.com

- Entry point

http://blog.mediamonks.com/

- Administrator sector

http://blog.mediamonks.com/admin


#### Fixing File Permissions

In case you have permission issues running this app with logs, cache or database run:

```shell
$ chmod -R 777 var
```

## API Documentation

The project has a web documentation in /api/doc

http://blog.mediamonks.com/api/doc


## Unit Testing

Unit test could be executed using:

```shell
$ ./bin/phpunit tests
```