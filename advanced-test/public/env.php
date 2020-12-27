<?php
  $variables = [
		'APP_NAME' => 'Project',
		'APP_ENV' => 'local',
		'APP_KEY' => '937a4a8c13e317dfd28effdd479cad2f',
		'DB_CONNECTION' => 'mysql',
		'DB_HOST' => 'localhost',
		'DB_USERNAME' => 'root',
		'DB_PASSWORD' => '',
		'DB_NAME' => 'default_db',
		'DB_PORT' => '3306',

		'REDIS_HOST' => '127.0.0.1',
		'REDIS_PORT' => '6379',
		'REDIS_PASSWORD' => 'Redis@123#!4&&&'
	];

	foreach ($variables as $key => $value) 
	{
		putenv("$key=$value");
	}
?>