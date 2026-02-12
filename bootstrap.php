<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '/');
}

require 'Core/App.php';
require 'Core/Container.php';
require 'Core/Database.php';
require_once 'Core/functions.php';


use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();



$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    return new Database($config['database']);
});

App::setContainer($container);


