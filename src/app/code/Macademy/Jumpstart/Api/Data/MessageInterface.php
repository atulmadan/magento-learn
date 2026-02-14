<?php

namespace Macademy\Jumpstart\Api\Data;

interface MessageInterface
{
    const ID = 'entity_id';
    const MESSAGE = 'message';
    const CREATED_AT = 'created_at';

    public function getId();
    public function setId($id);

    public function getMessage();
    public function setMessage($message);

    public function getCreatedAt();
}
