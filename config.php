<?php
require 'environment.php';

global $config;
$config = array();

if (ENVIRONMENT == 'development') {
	define("BASE_URL", 'http://localhost/infonature/');
	$config['dbname'] = 'infonature';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", 'http://infonature.com.br/');
	$config['dbname'] = 'infonature';
	$config['host'] = 'locahost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}