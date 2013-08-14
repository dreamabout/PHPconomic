<?php


namespace Dreamabout\PHPConomic;


abstract class Collection implements \Iterator
{
    protected $data;

    public function __construct($data = array())
    {
        $this->data = $data;
    }

    public function rewind()
    {
        return reset($this->data);
    }

    public function current()
    {
        return current($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function next()
    {
        return next($this->data);
    }

    public function valid()
    {
        return key($this->data) !== null;
    }

    abstract public function add($data);
}
