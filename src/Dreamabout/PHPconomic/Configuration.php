<?php


namespace Dreamabout\PHPConomic;


class Configuration
{
    const WSDL_URL   = "https://www.e-conomic.com/secure/api1/economicwebservice.asmx?WSDL";
    const CACHE_DIR = __DIR__;
    const CACHE_FILE = "wsdl_cache.wsdl";
    public $token;
    public $appToken;
    public $autoStart = false;
}
