<?php


namespace Dreamabout\PHPconomic\Base;


interface RequestInterface 
{
    /**
     * @return array
     */
    public function getHeaders();
    public function toXml();
}
