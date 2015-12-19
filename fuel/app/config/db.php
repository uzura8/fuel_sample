<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
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
