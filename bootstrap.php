<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Set error reporting level based on environment
if (defined('ENVIRONMENT')) {
	switch (ENVIRONMENT) {
		case 'development':
		case 'testing':
			error_reporting(-1);
			break;
		case 'staging':
		case 'production':
			error_reporting(0);
			break;
		default:
			die("The application environment must be set to 'development', 'testing', 'staging' or 'production'");
	}
}

// Define the __autoload method
function __autoload($class) { include $class . SCRIPTEXT; }

// Create variable to hold a new instance of Router class
$router = new Router();

// Load the layout file only one
require_once 'layout' . DISPLAYEXT;
