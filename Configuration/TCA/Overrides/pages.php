<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

call_user_func(function ($packageKey) {
    ExtensionManagementUtility::registerPageTSConfigFile($packageKey, 'Configuration/PageTs/TsConfig.page.typoscript',
        'EmailTemplate default Page TS-Config');
    ExtensionManagementUtility::registerPageTSConfigFile($packageKey, 'Configuration/PageTs/BackendLayouts/OneColumn.page.typoscript',
        'EmailTemplate BE-Layout: One column');
}, 'email_template');
