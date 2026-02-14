<?php

namespace Macademy\Jumpstart\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Message extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('macademy_jumpstart_message', 'entity_id');
    }
}
