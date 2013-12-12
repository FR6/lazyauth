lazyauth
========

Laravel 4 package for a really basic HTTP authentication process.

# Installation

- Install package

	In composer.json (of the root of your project) add the package:

		{
			...
			"require": { 
				...
				"FR6/lazyauth": "dev-master"
			},
			"repositories": [{
				"type": "git",
				"url": "git@github.com:FR6/lazyauth.git"		
			}],
			...
		}

	$ composer update FR6/lazyauth

	In app/config/app.php

		'providers' => array(
			...
			'FR6\Lazyauth\LazyauthServiceProvider'
		)

	$ composer dump-autoload

- Publish configuration file

	$ php artisan config:publish FR6/lazyauth

# Usage

In your routes.php:

	Route::group(array('before' => 'lazyauth', 'prefix' => 'admin'), function(){

		Route::get('/', function(){
			...
		});
	});
