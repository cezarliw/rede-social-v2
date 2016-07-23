<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(dirname(__FILE__)));
define('ROUTES', ROOT_PATH . DS . 'app' . DS . 'routes');
define('MODELS', ROOT_PATH . DS . 'app' . DS . 'models');

$composer = ROOT_PATH . DS . 'vendor' . DS . 'autoload.php';

if ( ! file_exists($composer)) {
	die('Run composer install');
}

require $composer;

$config = require ROOT_PATH . DS . 'app' . DS . 'config.php';

ActiveRecord\Config::initialize(function($cfg) use ($config) {
	$cfg->set_model_directory(MODELS);
	$cfg->set_connections([
		'development' => sprintf(
			'%s://%s:%s@%s/%s', 
			$config->driver, 
			$config->username, 
			$config->password, 
			$config->host, 
			$config->dbname
		)
	]);
});

$app = new \Slim\App([
	'settings' => [
        'displayErrorDetails' => true,
    ]
]);

require ROUTES . DS . 'index.php';

$app->run();