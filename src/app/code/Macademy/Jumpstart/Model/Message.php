<?php

namespace Macademy\Jumpstart\Model;

use Magento\Framework\Model\AbstractModel;
use Macademy\Jumpstart\Api\Data\MessageInterface;

class Message extends AbstractModel implements MessageInterface
{
    protected function _construct()
    {
        $this->_init(\Macademy\Jumpstart\Model\ResourceModel\Message::class);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function getMessage()
    {
        return $this->getData(self::MESSAGE);
    }

    public function setMessage($message)
    {
        return $this->setData(self::MESSAGE, $message);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }
}
