<?php

namespace Macademy\Jumpstart\Api;

use Macademy\Jumpstart\Api\Data\MessageInterface;

interface MessageRepositoryInterface
{
    public function save(MessageInterface $message);

    public function getById($id);

    public function delete(MessageInterface $message);
}
