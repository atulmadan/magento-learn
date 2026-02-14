<?php

namespace Macademy\Jumpstart\Model;

use Macademy\Jumpstart\Api\MessageRepositoryInterface;
use Macademy\Jumpstart\Api\Data\MessageInterface;
use Macademy\Jumpstart\Model\ResourceModel\Message as ResourceMessage;
use Macademy\Jumpstart\Model\MessageFactory;

class MessageRepository implements MessageRepositoryInterface
{
    protected $resource;
    protected $factory;

    public function __construct(
        ResourceMessage $resource,
        MessageFactory $factory
    ) {
        $this->resource = $resource;
        $this->factory = $factory;
    }

    public function save(MessageInterface $message)
    {
        $this->resource->save($message);
        return $message;
    }

    public function getById($id)
    {
        $message = $this->factory->create();
        $this->resource->load($message, $id);
        return $message;
    }

    public function delete(MessageInterface $message)
    {
        $this->resource->delete($message);
        return true;
    }
}
