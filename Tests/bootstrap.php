<?php

use Dreamabout\PHPConomic;

$testdir = __dir__;
$rootdir = dirname($testdir);

set_include_path(".:/usr/share/php:{$testdir}:{$rootdir}:" . get_include_path());
define('TEST', true);

require_once 'Hamcrest/Hamcrest.php';
require_once 'Phake.php';
require_once 'vendor/autoload.php';


function uot()
{
    $config           = new PHPConomic\Configuration();
    $config->token    = "XTkjgtdXWUd4SgP65OTx1slAjXtdElBeU8viA7nOS3w1";
    $config->appToken = "_0TbKb3Q2YAwqsca7BlNAi625omeQAdN5ZYeJtAqXIY1";

    return new PHPConomic($config);
}
