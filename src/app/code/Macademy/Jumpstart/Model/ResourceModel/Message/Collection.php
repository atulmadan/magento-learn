<?php

namespace Macademy\Jumpstart\Model\ResourceModel\Message;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Macademy\Jumpstart\Model\Message::class,
            \Macademy\Jumpstart\Model\ResourceModel\Message::class
        );
    }
}
