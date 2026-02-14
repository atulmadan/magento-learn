<?php

namespace Macademy\Jumpstart\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\RequestInterface;
use Macademy\Jumpstart\Api\MessageRepositoryInterface;
use Macademy\Jumpstart\Api\Data\MessageInterfaceFactory;

class Save implements HttpPostActionInterface
{
    protected $repository;
    protected $messageFactory;
    protected $redirectFactory;
    protected $messageManager;
    protected $request;

    public function __construct(
        MessageRepositoryInterface $repository,
        MessageInterfaceFactory    $messageFactory,
        RedirectFactory            $redirectFactory,
        ManagerInterface           $messageManager,
        RequestInterface           $request
    )
    {
        $this->repository = $repository;
        $this->messageFactory = $messageFactory;
        $this->redirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
        $this->request = $request;
    }

    public function execute()
    {
        $resultRedirect = $this->redirectFactory->create();
        $post = $this->request->getPostValue();

        if (!$post || empty($post['message'])) {
            $this->messageManager->addErrorMessage(__('Message cannot be empty.'));
            return $resultRedirect->setPath('*/*/');
        }

        try {
            $message = $this->messageFactory->create();
            $message->setMessage($post['message']);

            $this->repository->save($message);

            $this->messageManager->addSuccessMessage(__('Message saved successfully.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Error saving message.'));
        }

        return $resultRedirect->setPath('*/*/');
    }
}


