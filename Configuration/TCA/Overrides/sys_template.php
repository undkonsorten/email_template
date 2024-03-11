<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

// Boot function
call_user_func(function($packageKey) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('email_template', 'Configuration/TypoScript/Main',
        'Newsletter HTML mail rendering (Main)');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('email_template', 'Configuration/TypoScript/PlainText',
        'Newsletter Plaintext rendering');
}, 'email_template');
