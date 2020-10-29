<?php
function arraySort($menuArray, $sort = SORT_ASC, $key = 'sort') {
	usort ($menuArray, function ($a, $b) use ($sort, $key) {
		return ($sort == SORT_DESC) ? $b[$key] <=> $a[$key] : $a[$key] <=> $b[$key];
	});
	return $menuArray;
}

function printMenu($menuArray, $sort, $type='') {
	if (empty($_SESSION['auth'])) {
		array_pop($menuArray);
	} 
	$menu = arraySort($menuArray, $sort);
	require($_SERVER['DOCUMENT_ROOT'] . '/templates/menu.php');
}

$menuArray = [
	[
		'title' => 'Главная',
		'sort' => 1,
		'path' => '/'
	],
	[
		'title' => 'Контакты',
		'sort' => 3,
		'path' => '/route/contacts/'
	],
	[
		'title' => 'О нас',
		'sort' => 2,
		'path' => '/route/about/'
	],
	[
		'title' => 'Каталог',
		'sort' => 5,
		'path' => '/route/catalog/'
	],
	[
		'title' => 'Новости',
		'sort' => 4,
		'path' => '/route/news/'
	],
	[
		'title' => 'Профиль',
		'sort' => 6,
		'path' => '/route/profile/'
	]
];
