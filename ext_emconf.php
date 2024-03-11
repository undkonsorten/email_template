<?php
/** @noinspection PhpUndefinedVariableInspection */
$EM_CONF[$_EXTKEY] = [
	'title' => 'E-Mail Template',
	'description' => 'Build table based E-Mail templates with Inky tags.',
	'category' => 'services',
	'author' => 'Felix Althaus, Karsten Nowak',
	'author_email' => 'felix.althaus@undkonsorten.com, nowak@undkonsorten.com',
	'state' => 'alpha',
	'version' => '0.0.1',
	'constraints' => [
		'depends' => [
			'typo3' => '9.5.0 - 12.4.99',
			'html_mail_utility' => '4.0.0 - 0.0.0',
        ],
    ],
    'autoload' => [
        'psr-4' => ['Undkonsorten\\EmailTemplate\\' => 'Classes'],
    ],
];
