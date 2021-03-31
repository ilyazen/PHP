<?php
/**
 * путь => [
 * controller =>''
 * action => ''
 * ]
 *
 */

return [


	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],

	'account/register' => [
		'controller' => 'account',
		'action' => 'register',
	],
    //главная страница
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
	
];