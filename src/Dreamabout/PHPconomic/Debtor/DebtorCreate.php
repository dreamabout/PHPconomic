<?php


namespace Dreamabout\PHPconomic\Debtor;


use Dreamabout\PHPconomic\Base\RequestInterface;
use Guzzle\Http\Message\EntityEnclosingRequest;
use Guzzle\Http\Message\Response;

class DebtorCreate implements RequestInterface
{
    private $request;
    private $return;

    public function __construct(EntityEnclosingRequest $request)
    {
        $this->request = $request;
    }

    public function getHeaders()
    {
        return array("SOAPAction" => "http://e-conomic.com/Debtor_CreateFromData");
    }

    public function send()
    {
        $this->request->addHeaders($this->getHeaders());
        $this->request->setBody($this->toXml(), "application/soap+xml; charset=utf-8");

        $return = $this->request->send();
        $this->handleReturn($return);
    }

    private function handleReturn(Response $return)
    {

    }

    public function toXml()
    {

    }
}
