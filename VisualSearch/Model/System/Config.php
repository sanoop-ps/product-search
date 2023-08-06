<?php

declare(strict_types=1);

namespace DevOmniverse\VisualSearch\Model\System;

use Exception;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    public const VISUAL_SEARCH_API_ENABLED = 'visual_search/vs_general/enabled';
    public const VISUAL_SEARCH_API_PROJECT_NAME = 'visual_search/vs_general/project_name';
    public const VISUAL_SEARCH_API_LOCATION = 'visual_search/vs_general/location';
    public const VISUAL_SEARCH_API_PRODUCT_SET = 'visual_search/vs_general/product_set';
    public const GOOGLE_STORAGE_API_BUCKET_NAME = 'visual_search/google_storage/bucket_name';
    public const GOOGLE_STORAGE_API_KEY = 'visual_search/google_storage/gs_api_key';
    /**
     * API URL config path
     *
     * @var string VISUAL_SEARCH_API_BASE_URL
     */
    public const VISUAL_SEARCH_API_BASE_URL = 'visual_search/vs_api/vs_endpoint';
    /**
     * API client id config path
     *
     * @var string VISUAL_SEARCH_API_CLIENT_ID
     */
    public const VISUAL_SEARCH_API_CLIENT_ID = 'visual_search/vs_api/vs_client_id';
    /**
     * API secret key config path
     *
     * @var string VISUAL_SEARCH_API_CLIENT_SECRET
     */
    public const VISUAL_SEARCH_API_CLIENT_SECRET = 'visual_search/vs_api/vs_client_secret';
    /**
     * API callback url config path
     *
     * @var string VISUAL_SEARCH_CALLBACK_URL
     */
    public const VISUAL_SEARCH_CALLBACK_URL = 'visual_search/vs_api/vs_callback_url';
    /**
     * API auth url config path
     *
     * @var string VISUAL_SEARCH_AUTH_URL
     */
    public const VISUAL_SEARCH_AUTH_URL = 'visual_search/vs_api/vs_auth_url';
    /**
     * API access token url config path
     *
     * @var string VISUAL_SEARCH_ACCESS_TOKEN_URL
     */
    public const VISUAL_SEARCH_ACCESS_TOKEN_URL = 'visual_search/vs_api/vs_scope';
    /**
     * API scope config path
     *
     * @var string VISUAL_SEARCH_SCOPE
     */
    public const VISUAL_SEARCH_SCOPE = 'visual_search/vs_api/vs_scope';
    public const VISUAL_SEARCH_BEARER_TOKEN = 'visual_search/vs_api/vs_token';

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        private readonly ScopeConfigInterface   $scopeConfig
    ) {
    }

    public function getVisualSearchEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::VISUAL_SEARCH_API_ENABLED);
    }

    public function getVisualSearchProjectName(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_API_PROJECT_NAME);
    }

    public function getVisualSearchLocation(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_API_LOCATION);
    }

    public function getVisualSearchProductSet(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_API_PRODUCT_SET);
    }

    public function getGoogleStorageBucketName(): string|null
    {
        return $this->scopeConfig->getValue(self::GOOGLE_STORAGE_API_BUCKET_NAME);
    }

    public function getGoogleStorageApiKey(): string|null
    {
        return $this->scopeConfig->getValue(self::GOOGLE_STORAGE_API_KEY);
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
    public function getVisualSearchScope(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_SCOPE);
    }

    public function getVisualSearchApiToken(): string|null
    {
        return $this->scopeConfig->getValue(self::VISUAL_SEARCH_BEARER_TOKEN);
    }
}