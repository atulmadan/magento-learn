<?php
namespace Macademy\Jumpstart\Controller\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;



class Index implements HttpGetActionInterface
{


    public function __construct( protected PageFactory $pageFactory)
    {
//        parent::__construct($context);
//        $this->pageFactory = $pageFactory;


    }

    public function execute():Page
    {
        $result = $this->pageFactory->create();


        return $result;
    }
}

