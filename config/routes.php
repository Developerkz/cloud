<?php
return array(
	'admin/logout' => 'admin/logout',


	'file/([A-Za-z0-9]+)' => 'file/view/$1',

	'news/([A-Za-z0-9]+)' => 'news/view/$1',
	'news' => 'news/list',

	'register' => 'user/register',
	'login' => 'user/login',
	'logout' => 'user/logout',
	'remind' => 'user/remind',

	'account/files' => 'user/files',
	'account/traffic' => 'user/traffic',
	'account/score' => 'user/score',
	'account/statistics' => 'user/downloads',
	'account' => 'user/account',

	'admin/file-delete/([A-Za-z0-9]+)' => 'adminFile/delete/$1',
	'admin/file-view/([A-Za-z0-9]+)' => 'adminFile/view/$1',

	'admin/user-list' => 'adminUser/list',
	'admin/user-view/id([0-9]+)' => 'adminUser/view/$1',
	'admin/user-ban/id([0-9]+)' => 'adminUser/ban/$1',
	'admin/user-normal/id([0-9]+)' => 'adminUser/normal/$1',
	'admin/user-delete/id([0-9]+)' => 'adminUser/delete/$1',

	'admin/order-list' => 'adminOrder/list',
	'admin/order-pay/([0-9]+)' => 'adminOrder/pay/$1',

	
	'admin/news-list' => 'adminNews/list',
	'admin/news-add' => 'adminNews/add',
	'admin/news-update/([0-9]+)' => 'adminNews/update/$1',
	'admin/news-delete/([0-9]+)' => 'adminNews/delete/$1',

	'admin/panel' => 'admin/panel',
	'admin' => 'admin/auth',
	'backend' => 'admin/auth',

	'main' => 'main/index',

);
?>