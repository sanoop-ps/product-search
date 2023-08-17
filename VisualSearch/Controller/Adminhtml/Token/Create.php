<?php
namespace DevOmniverse\VisualSearch\Controller\Adminhtml\Token;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Create extends Action
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        die('hi');
       dd($this->getRequest()->getParams());
    }
}
