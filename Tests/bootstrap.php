<?php

$testdir = __dir__;
$rootdir = dirname($testdir);

set_include_path(".:/usr/share/php:{$testdir}:{$rootdir}:" . get_include_path());
define('TEST', true);

require_once 'Hamcrest/Hamcrest.php';
require_once 'Phake.php';
require_once 'vendor/autoload.php';
