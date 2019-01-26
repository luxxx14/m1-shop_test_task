<?php

/* данные для доступа к БД */
define('dbHost', 'localhost');
define('dbUser', 'root');
define('dbPass', '');
define('dbName', 'test');

require_once 'core/dbOperations.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

Route::start();