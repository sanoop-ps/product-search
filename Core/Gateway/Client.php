<?php
/*******************************************************************************
 * DEVOMNIVERSE CONFIDENTIAL
 * ___________________
 *
 * Copyright 2023 DevOmniverse
 * All Rights Reserved.
 *
 * NOTICE: All information contained herein is, and remains
 * the property of DevOmniverse and its suppliers, if any. The intellectual
 * and technical concepts contained herein are proprietary to DevOmniverse
 * and its suppliers and are protected by all applicable intellectual
 * property laws, including trade secret and copyright laws.
 * DevOmniverse permits you to use and modify this file
 * in accordance with the terms of the DevOmniverse license agreement
 * accompanying it (see LICENSE_DEVOMNIVERSE_PS.txt).
 * If you have received this file from a source other than DevOmniverse,
 * then your use, modification, or distribution of it
 * requires the prior written permission from DevOmniverse.
 ******************************************************************************/
declare(strict_types=1);

namespace DevOmniverse\Core\Gateway;

use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\HTTP\Client\CurlFactory;

/**
 * @package Client
 */
class Client implements ClientInterface
{
    /**
     * @var int
     */
    public const TIMEOUT = 10;

    /**
     * Client Constructor
     *
     * @param CurlFactory $curlFactory
     */
    public function __construct(
    private readonly CurlFactory $curlFactory
    ) {
    }

    /**
     * Post CURL Request and return response body
     *
     * @param string $apiEndpoint
     * @param string $requestBody
     * @param array  $header
     * @param array  $options
     * @param int    $timeOut
     *
     * @return string
     */
    public final function postRequest(
        string $apiEndpoint,
        string $requestBody = '',
        array  $header = [],
        array  $options = [],
        int    $timeOut = self::TIMEOUT
    ): string {
        $curl = $this->curlFactory->create();
        $curl = $this->setProperty($curl, $header, $options, $timeOut);
        $curl->post($apiEndpoint, $requestBody);

        return $curl->getBody();
    }

    /**
     * Post CURL Request and return full response
     *
     * @param string $apiEndpoint
     * @param string $requestBody
     * @param array  $header
     * @param array  $options
     * @param int    $timeOut
     *
     * @return Curl
     */
    public final function post(
        string $apiEndpoint,
        string $requestBody = '',
        array  $header = [],
        array  $options = [],
        int    $timeOut = self::TIMEOUT
    ): Curl {
        $curl = $this->curlFactory->create();
        $curl = $this->setProperty($curl, $header, $options, $timeOut);
        $curl->post($apiEndpoint, $requestBody);

        return $curl;
    }

    /**
     * Set Property.
     *
     * @param Curl  $curl
     * @param array $headers
     * @param array $options
     * @param int   $timeOut
     *
     * @return Curl
     */
    private function setProperty(
        Curl  $curl,
        array $headers = [],
        array $options = [],
        int   $timeOut = self::TIMEOUT
    ): Curl {
        if (!empty($headers)) {
            foreach ($headers as $headerKey => $headerValue) {
                $curl->addHeader($headerKey, $headerValue);
            }
        }
        if (!empty($options)) {
            foreach ($options as $optionKey => $optionValue) {
                $curl->setOption($optionKey, $optionValue);
            }
        }
        $curl->setOption(CURLOPT_TIMEOUT, $timeOut);
        $curl->setOption(CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        return $curl;
    }

    /**
     * Get CURL Request
     *
     * @param string $apiEndpoint
     * @param array  $header
     * @param array  $options
     * @param int    $timeOut
     *
     * @return string
     */
    public final function getRequest(
        string $apiEndpoint,
        array  $header = [],
        array  $options = [],
        int    $timeOut = self::TIMEOUT
    ): string {
        $curl = $this->curlFactory->create();
        $curl = $this->setProperty($curl, $header, $options, $timeOut);
        $curl->get($apiEndpoint);

        return $curl->getBody();
    }
}
