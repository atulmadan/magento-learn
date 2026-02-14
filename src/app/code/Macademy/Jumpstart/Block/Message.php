<?php

namespace Macademy\Jumpstart\Block;

use Magento\Framework\View\Element\Template;
use Macademy\Jumpstart\Model\MessageFactory;

class Message extends Template
{
    protected $messageFactory;

    public function __construct(
        Template\Context $context,
        MessageFactory   $messageFactory,
        array            $data = []
    )
    {
        $this->messageFactory = $messageFactory;
        parent::__construct($context, $data);
    }

    public function getMessages()
    {
        return $this->messageFactory
            ->create()
            ->getCollection();
    }
}

