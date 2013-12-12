<?php

Route::filter('lazyauth', function(){

	$auth = false;

	if((isset($_SERVER['PHP_AUTH_USER'])) && (isset($_SERVER['PHP_AUTH_PW']))){	
		if($_SERVER['PHP_AUTH_USER'] == Config::get('lazyauth::lazyauth.username') && 
			$_SERVER['PHP_AUTH_PW'] == Config::get('lazyauth::lazyauth.password')){
			$auth = true;

			Session::put('lazyauth.is_admin', true);
		}
	}
	if(!$auth){

		Session::put('lazyauth.is_admin', false);

		header('WWW-Authenticate: Basic realm="My Realm"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'Sorry dude.';
		exit();
	}
});
