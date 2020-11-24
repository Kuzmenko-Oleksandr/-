<?php
require_once("db.php");
require_once ("models/films.php");

$link = db_connect();
$films = film_all($link);

require('index1.php');
?>
