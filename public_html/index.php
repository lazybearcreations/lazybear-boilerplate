<?php

// Define the APPLICATION settings array
define('SETTINGS', parse_ini_file('../config/application.ini'));

// Define the environment that the application is running
define('ENVIRONMENT', SETTINGS['environment']);

// Define include paths for php
define('PUBLICPATH', realpath(dirname(__FILE__)));
define('BASEPATH', realpath(PUBLICPATH . '/..'));
define('LIBRARY', BASEPATH . '/library');
define('APPLICATION', BASEPATH . '/application');

// Define extensions for file types
define('SCRIPTEXT', SETTINGS['script_extension']);
define('DISPLAYEXT', SETTINGS['display_extension']);

// Define database credentials
define('DATABASE', array(
    "HOST" => SETTINGS['database_host'],
    "NAME" => SETTINGS['database_name'],
    "USER" => SETTINGS['database_user'],
    "PASSWORD" => SETTINGS['database_password']
));

// Add paths to the include path for php
set_include_path(
    implode(
        PATH_SEPARATOR,
        array(
            BASEPATH,
            PUBLICPATH,
            LIBRARY,
            APPLICATION,
            get_include_path()
        )
    )
);

// Load the bootstrap file
include 'bootstrap' . SCRIPTEXT;
