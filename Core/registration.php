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

/**
 * DevOmniverse Core module registration
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(ComponentRegistrar::MODULE, 'DevOmniverse_Core', __DIR__);

