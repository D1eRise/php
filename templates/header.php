<?php

session_name('session_id');
session_start();

if (empty($_SESSION) && ! isset($_GET['login']) && $_GET['login'] != 'yes') {
    header('Location: /?login=yes');
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/main_menu.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/cut_string.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/url.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/title.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/connect.php');

$showForm = false;
$showSuccess = false;
$showError = false;

if (((isset($_GET['login'])) && ($_GET['login'] == 'yes')) || ((isset($_GET['exit'])) && ($_GET['exit'] == 'yes'))) {
	$showForm = true;
}

if (isset($_POST['auth'])) {
	$userEmail = mysqli_real_escape_string(connect(), trim(mb_strtolower($_POST["login"])));
	$user = mysqli_fetch_assoc(mysqli_query(connect(), "select id, password from users where email='$userEmail' limit 1"));
    if ($user && password_verify($_POST["password"], $user['password'])) {
        $_SESSION['auth'] = true;
        $_SESSION['userId'] = $user['id'];
        setcookie('login', $_POST['login'], time()+60*60*24*30, '/');
        $showSuccess = true;
        $showForm = false;
    } else {
        $showError = true;
    }
}     

if (!empty($_SESSION['auth']) && isset($_COOKIE['login'])) {
    setcookie('login', $_COOKIE['login'], time()+60*60*24*30, '/');
}

if (isset($_POST['exit'])) {
    $_SESSION['auth'] = false;
    session_destroy();
    $showForm = true;
} 

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>

    <div class="header">
    	<div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"></div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix">
    <?php printMenu($menuArray, SORT_ASC, 'main-menu'); ?>
    </div>