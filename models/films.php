<?php
function film_all($link){
    $query = "SELECT * FROM film ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result)
        die (mysqli_error($link));

    $n = mysqli_num_rows($result);
    $film = array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $film[] = $row;
    }

    return $film;
}
function film_get($link, $id_film) {
    $query = sprintf("SELECT * FROM film WHERE id=%d", (int)$id_film);

    $result = mysqli_query($link, $query);

    if (!$result) die (mysqli_error($link));

    $film = mysqli_fetch_assoc($result);

    return $film;
}
function film_new($link, $name_, $duration,$name_director,$surname_director)
{
    $name_ = trim($name_);
    $duration = trim($duration);
    $name_director = trim($name_director);
    $surname_director = trim($surname_director);

    if ($name_ == "") {
        return false;
    }

    $g = "INSERT INTO film (name, duration, name_director, surname_director ) VALUES ('%s', '%s', '%s','%s')";

    $query = sprintf($g, mysqli_real_escape_string($link, $name_), mysqli_real_escape_string($link, $duration), mysqli_real_escape_string($link, $name_director), mysqli_real_escape_string($link, $surname_director));

    $result = mysqli_query($link, $query);

    if(!$result) {
        die (mysqli_error($link));
    }

    return true;
}
function film_edit($link, $id, $name_, $duration,$name_director,$surname_director) {
    $name_ = trim($name_);
    $duration = trim($duration);
    $name_director = trim($name_director);
    $surname_director = trim($surname_director);

    $id = (int)$id;

    if($name_ == '') {
        return false;
    }

    $sql = "UPDATE film SET name_='%s', duration='%s', name_director='%s', surname_director='%s' WHERE id='%d'";

    $query = sprintf($sql, mysqli_real_escape_string($link, $name_), mysqli_real_escape_string($link, $duration), mysqli_real_escape_string($link, $name_director), mysqli_real_escape_string($link, $surname_director), $id);

    $result = mysqli_query($link, $query);

    if (!$result) {
        die(mysqli_error($link));
    }

    return mysqli_affected_rows($link);
}

function film_delete($link, $id) {
    $id = (int)$id;

    if($id == 0) {
        return false;
    }

    $query = sprintf("DELETE FROM film WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }

    return mysqli_affected_rows($link);
}
?>
