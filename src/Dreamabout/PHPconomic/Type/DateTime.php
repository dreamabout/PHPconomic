<?php


namespace Dreamabout\PHPConomic\Type;


class DateTime implements TypeInterface
{
    private $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function toXSD()
    {
        return date("c", strtotime($this->date));
    }
}
