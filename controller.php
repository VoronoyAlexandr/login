<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 21.07.14
 * Time: 13:25
 */
require_once('class/PDO.php');

session_start();

DataBase::Connect();
$DB = new DataBase();

if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {

    $login = $DB->Query($_POST['login'], $_POST['password']);

    foreach ($login as $items) {
        if ($_POST['login'] === $items['login'] && $_POST['password'] === $items['password']) {
            $_SESSION['auth'] = 1;
            $_SESSION['name'] = $items['login'];
        } else {

        }
    }
}
if (isset($_POST['logout'])) {
    unset($_SESSION['auth']);
}