<?php

if (!defined('TYPO3')) {
	die('Access denied.');
}

call_user_func(function($packageKey) {

$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:fluid_styled_content/Resources/Private/Language/Database.xlf'][] = 'EXT:email_template/Resources/Private/Language/overrideTca.xlf';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['de']['EXT:fluid_styled_content/Resources/Private/Language/de.Database.xlf'][] = 'EXT:email_template/Resources/Private/Language/de.overrideTca.xlf';

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['newsletter'] = 'EXT:email_template/Configuration/Yaml/Rte.yaml';

},'email_template');
