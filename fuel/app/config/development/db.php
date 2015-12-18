<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'type'        => 'pdo',
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;port=3306;dbname=tmp_fuel_local',
			'username'   => 'root',
			'password'   => '',
		),
		'charset' => 'utf8',
		'table_prefix' => '',
		'enable_cache'   => false,
		'readonly' => array('slave1'),
	),
	// SlaveDB 設定
	'slave1' => array(
		'type'        => 'pdo',
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;port=3307;unix_socket=/tmp/mysql.sock2;dbname=tmp_fuel_local',
			'username'   => 'root',
			'password'   => '',
		),
		'charset' => 'utf8',
		'table_prefix' => '',
		'enable_cache'   => false,
	),
);
