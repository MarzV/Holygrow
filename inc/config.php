<?php

session_start();

$db = array(
			'host' => 'localhost',
			'dbname' => 'albabb',
			 'user' => 'root',
			 'pass' => '');

try
{
    $db = new PDO('mysql:host='.$db['host'].';dbname='.$db['dbname'],$db['user'],$db['pass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}


include_once 'class.user.php';
$user = new User($db);

?>