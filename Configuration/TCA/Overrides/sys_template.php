<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}

// Boot function
call_user_func(function($packageKey) {
    ExtensionManagementUtility::addStaticFile('email_template', 'Configuration/TypoScript/Main',
        'Newsletter HTML mail rendering (Main)');
    ExtensionManagementUtility::addStaticFile('email_template', 'Configuration/TypoScript/PlainText',
        'Newsletter Plaintext rendering');
}, 'email_template');
