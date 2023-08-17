<?php

declare(strict_types=1);

namespace DevOmniverse\VisualSearch\Block\Adminhtml\System\Config\Api;

use DevOmniverse\VisualSearch\Model\System\Config as ConfigHelper;
use Exception;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Button;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Phrase;

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
        Context                       $context,
        private readonly ConfigHelper $configHelper,
        array                         $data = []
    )
    {
        parent::__construct($context, $data);
    }

    /**
     * Retrieve element HTML markup
     *
     * @param AbstractElement $element
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @throws Exception
     */
    protected function _getElementHtml(AbstractElement $element): string
    {
        /** @var Button $buttonBlock */
        $buttonBlock = $this->getForm()->getLayout()->createBlock(Button::class);

        $params = $buttonBlock->getRequest()->getParams();

        $data = [
            'label' => $this->getLabel(),
            'onclick' => "setLocation('" . $this->getTokenUrl($params) . "')",
        ];

        $baseUri = $this->configHelper->getVisualSearchApiBaseUrl();
        $clientId = $this->configHelper->getVisualSearchApiClientId();
        $secret = $this->configHelper->getVisualSearchApiClientSecret();

        if (!$baseUri || !$clientId || !$secret) {
            $data['disabled'] = true;
        }

        return $buttonBlock->setData($data)->toHtml();
    }

    /**
     * Retrieve button label
     *
     * @return Phrase
     */
    public function getLabel(): Phrase
    {
        return __('Token');
    }

    /**
     * Retrieve Button URL
     *
     * @param array $params
     * @return string
     */
    public function getTokenUrl(array $params = []): string
    {
        return $this->getUrl('visualsearch/token/create', $params);
    }
}
