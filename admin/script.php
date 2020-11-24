<?php
require_once ('../db.php');
require_once ('../models/films.php');

$link = db_connect();

if(isset($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = '';
}

if(isset($_GET['page'])) {
    $page = $_GET['page'];
}
else {
    $page = '';
}

if ($page == 'films') {
    if ($action == 'add') {
        if (!empty($_POST)) {
            film_new($link, $_POST['name_'], $_POST['duration'], $_POST['name_director'], $_POST['surname_director']);
            header("Location: script.php?page=films");

        }
        include('../views/film_admin.php');
    } else if ($action == 'edit') {
        if (!isset($_GET['id']))
            header('Location: script.php?page=films');
        $id = (int)$_GET['id'];

        if (!empty($_POST) && $id > 0) {
            film_edit($link, $id, $_POST['name_'], $_POST['duration'], $_POST['name_director'], $_POST['surname_director']);
            header('Location: script.php?page=films');
        }
        $film = film_get($link, $id);
        include('../views/film_admin.php');
    } else if ($action == 'delete') {
        $id = $_GET['id'];
        $film = film_delete($link, $id);
        header('Location: script.php?page=films');

    } else {
        $films = film_all($link);
        include('../views/films_admin.php');
    }
}
?>