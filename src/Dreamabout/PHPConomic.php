<?php


namespace Dreamabout;


use Dreamabout\PHPConomic\Configuration;
use Dreamabout\PHPConomic\Exception\AuthenticationException;

class PHPConomic
{
    private $config;
    /** @var \SoapClient */
    static private $wsdl;
    private $connected = false;
    private $connectionToken;

    public function __construct(Configuration $config)
    {
        $this->config = $config;

        if ($config->autoStart) {
            $this->start();
        }
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->getClient(), $name), $arguments);
    }

    public function getClient()
    {
        if (self::$wsdl === null) {
            $this->start();
        }

        return self::$wsdl;
    }

    protected function start()
    {
        $this->connected = false;
        $cacheFile       = Configuration::CACHE_DIR . "/" . Configuration::CACHE_FILE;

        if (!file_exists($cacheFile) || filemtime($cacheFile) < time() - (24 * 3600 * 30)) {
            file_put_contents($cacheFile, file_get_contents(Configuration::WSDL_URL));
        }
        if (self::$wsdl === null) {
            self::$wsdl = new \SoapClient($cacheFile, array("trace" => true, "exception" => true, "cache" => WSDL_CACHE_DISK));
        }
    }

    public function connect()
    {
        if ($this->connected && $this->connectionToken) {
            return $this;
        }
        try {
            $response              = $this->getClient()->connectWithToken(array("token" => $this->config->token, "appToken" => $this->config->appToken));
            $this->connectionToken = $response->ConnectWithTokenResult;
        } catch (\SoapFault $e) {
            throw new AuthenticationException($e->getMessage(), $e->getCode());
        }

        return $this;
    }

    public function getConfiguration()
    {
        return $this->config;
    }

    public function getDebtor()
    {

    }

    public function reset(Configuration $configuration = null)
    {
        unset(self::$wsdl);
        $this->connected       = false;
        $this->connectionToken = false;
        if ($configuration !== null) {
            $this->config = $configuration;
        }
    }
}
