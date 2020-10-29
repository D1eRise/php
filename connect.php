<?php

function connect($dbHost = 'localhost', $dbUser = 'test', $dbPassword = 'test', $dbName = 'afonova_test') {
    static $connection = null;
    if ($connection === null) {
        $connection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName) or die('connectionError');
    }
    return $connection;
}
