<?php
namespace Macademy\Jumpstart\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Macademy\Jumpstart\Api\MessageRepositoryInterface;
use Macademy\Jumpstart\Api\Data\MessageInterfaceFactory;
use Magento\Framework\App\RequestInterface;

class Save implements HttpPostActionInterface
{
    

    public function __construct(
        protected MessageRepositoryInterface $repository,
        protected MessageInterfaceFactory $messageFactory,
        protected RedirectFactory $redirectFactory,
        protected RequestInterface $request
    ) {
        
    }

    public function execute()
    {
        $data = $this->request->getPostValue();

        if (!$data) {
            return $this->redirectFactory->create()->setPath('*/*/');
        }

        if (!empty($data['entity_id'])) {
            // UPDATE
            $message = $this->repository->getById($data['entity_id']);
        } else {
            // CREATE
            $message = $this->messageFactory->create();
        }

        $message->setMessage($data['message']);

        $this->repository->save($message);

        return $this->redirectFactory->create()->setPath('jumpstart/index/index');
    }
}
