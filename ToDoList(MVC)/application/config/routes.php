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
    'news/show'=> [
        'controller'=>'news',
        'action'=>'show'
    ],
    'notes/show' => [
        'controller' => 'notes',
        'action' => 'show',
    ],
    'notes/done' => [
        'controller' => 'notes',
        'action' => 'done',
    ],
    'notes/delete' => [
        'controller' => 'notes',
        'action' => 'delete',
    ],
    'notes/add' => [
        'controller' => 'notes',
        'action' => 'add',
    ],
    //главная страница
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],


	
];