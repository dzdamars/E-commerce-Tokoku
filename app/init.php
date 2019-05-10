<?php

session_start();
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNY', 'lks_dam');
define('SESS', md5('lks_dam'));
define('SITE', 'http://localhost/Tokoku');


require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';