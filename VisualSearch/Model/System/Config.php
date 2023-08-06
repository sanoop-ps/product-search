<?php

declare(strict_types=1);

namespace DevOmniverse\VisualSearch\Model\System;

use Exception;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    /**
     * API URL config path
     *
     * @var string VISUAL_SEARCH_API_BASE_URL
     */
    public const VISUAL_SEARCH_API_BASE_URL = 'visual_search/gv_api_management/vs_endpoint/';
    /**
     * API client id config path
     *
     * @var string VISUAL_SEARCH_API_CLIENT_ID
     */
    public const VISUAL_SEARCH_API_CLIENT_ID = 'visual_search/gv_api_management/vs_client_id';
    /**
     * API secret key config path
     *
     * @var string VISUAL_SEARCH_API_CLIENT_SECRET
     */
    public const VISUAL_SEARCH_API_CLIENT_SECRET = 'visual_search/gv_api_management/vs_client_secret';
    /**
     * API callback url config path
     *
     * @var string VISUAL_SEARCH_CALLBACK_URL
     */
    public const VISUAL_SEARCH_CALLBACK_URL = 'visual_search/gv_api_management/vs_callback_url';
    /**
     * API auth url config path
     *
     * @var string VISUAL_SEARCH_AUTH_URL
     */
    public const VISUAL_SEARCH_AUTH_URL = 'visual_search/gv_api_management/vs_auth_url';
    /**
     * API access token url config path
     *
     * @var string VISUAL_SEARCH_ACCESS_TOKEN_URL
     */
    public const VISUAL_SEARCH_ACCESS_TOKEN_URL = 'visual_search/gv_api_management/vs_access_token_url';/**
     * API scope config path
     *
     * @var string VISUAL_SEARCH_SCOPE
     */
    public const VISUAL_SEARCH_SCOPE = 'visual_search/gv_api_management/vs_scope';

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        private readonly ScopeConfigInterface   $scopeConfig
    ) {
    }

    /**
     * Retrieve Visual Search base URL
     *
     * @return string
     */
    public function getVisualSearchApiBaseUrl(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_API_BASE_URL);
    }

    /**
     * Retrieve Visual Search client_id
     *
     * @return string
     */
    public function getVisualSearchApiClientId(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_API_CLIENT_ID);
    }

    /**
     * Retrieve Visual Search client_secret
     *
     * @return string
     * @throws Exception
     */
    public function getVisualSearchApiClientSecret(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_API_CLIENT_SECRET);
    }

    /**
     * Retrieve Visual Search callback_url
     *
     * @return string
     * @throws Exception
     */
    public function getVisualSearchCallbackUrl(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_CALLBACK_URL);
    }

    /**
     * Retrieve Visual Search auth_url
     *
     * @return string
     * @throws Exception
     */
    public function getVisualSearchAuthUrl(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_AUTH_URL);
    }

    /**
     * Retrieve Visual Search access_token_url
     *
     * @return string
     * @throws Exception
     */
    public function getVisualSearchAccessTokenUrl(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_ACCESS_TOKEN_URL);
    }

    /**
     * Retrieve Visual Search scope
     *
     * @return string
     * @throws Exception
     */
    public function getVisualScope(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_SCOPE);
    }

}
