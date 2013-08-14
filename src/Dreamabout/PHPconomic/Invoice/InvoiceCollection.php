<?php


namespace Dreamabout\PHPConomic\Invoice;


use Dreamabout\PHPConomic\Collection;

class InvoiceCollection extends Collection
{
    public function add($data)
    {
        if(!$data instanceof Invoice ) {
            throw new Exception("Invalid data supplied to collection");
        }
        $this->data[] = $data;
    }

}
