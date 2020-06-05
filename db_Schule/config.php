<?php
/**
 * Created by PhpStorm.
 * User: kase
 * Date: 25.02.2019
 * Time: 13:17
 */
$server = 'localhost';
$user = 'katteneder';
$pwd = '';
$db = 'schule';

try
{
    $con = new PDO('mysql:host='.$server.';dbname='.$db.';charset=utf8', $user, $pwd);

    /* ExceptionHandling explizit einschalten/aktivieren */
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    echo $e->getMessage();
}