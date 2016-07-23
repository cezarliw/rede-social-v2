<?php

$app->get('/', function () {
	
	User::create([
		'name' => 'gilglecio',
		'email' => 'gilglecio_765@hotmail.com',
		'password' => password_hash(123456, PASSWORD_DEFAULT)
	]);

	echo 'Rede Social v2';
});