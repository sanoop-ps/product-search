<?php

declare(strict_types=1);

namespace DevOmniverse\VisualSearch\Block\Adminhtml\System\Config\Api;

use DevOmniverse\VisualSearch\Model\System\Config as ConfigHelper;
use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Backend\Block\Widget\Button;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Token extends Field
{
    /**
     * Test constructor
     *
     * @param Context $context
     * @param ConfigHelper $configHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        private readonly ConfigHelper $configHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Retrieve element HTML markup
     *
     * @param AbstractElement $element
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @throws \Exception
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        /** @var \Magento\Backend\Block\Widget\Button $buttonBlock  */
        $buttonBlock = $this->getForm()->getLayout()->createBlock(Button::class);

        $website = $buttonBlock->getRequest()->getParam('website');
        $store   = $buttonBlock->getRequest()->getParam('store');

        $params = [
            'website' => $website,
            'store'   => $store
        ];

        $data = [
            'label' => $this->getLabel(),
            'onclick' => "setLocation('" . $this->getTestUrl($params) . "')",
        ];

        $baseUri = $this->configHelper->getVisualSearchApiBaseUrl();
        $clientId = $this->configHelper->getVisualSearchApiClientId();
        $secret = $this->configHelper->getVisualSearchApiClientSecret();

        if (!$baseUri || !$clientId || !$secret) {
            $data['disabled'] = true;
        }

        $html = $buttonBlock->setData($data)->toHtml();

        return $html;
    }

    /**
     * Retrieve button label
     *
     * @return \Magento\Framework\Phrase
     */
    public function getLabel()
    {
        return  __('Token');
    }

    /**
     * Retrieve Button URL
     *
     * @param array $params
     * @return string
     */
    public function getTestUrl(array $params = [])
    {
        return $this->getUrl('akeneo_connector/test', $params);
    }
}
