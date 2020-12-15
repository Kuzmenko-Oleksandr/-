<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блок1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    th, td, a{
        color: white;
        text-decoration: none;
    }
    a:hover{
        color: red;

    }
</style>


<body style="background: #4a4949">
<div class="container">
    <div class="row">

        <div class="col-sm">
        <br>
        <table class="table" border="1">
            <thead class="thead-light">
            <tr>
                <th>Имя фильма</th>
                <th>Продолжительность</th>
                <th>Имя режисера</th>
                <th >Фамилия режисера</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <?php
            foreach($films as $f):?>
                <tr>

                    <td><?=$f["name_"]?></td>
                    <td><?=$f["duration"]?></td>
                    <td><?=$f["name_director"]?></td>
                    <td ><?=$f["surname_director"]?></td>
                    <td><a href="script.php?page=films&action=edit&id=<?= $f['id'] ?>">Редактировать</a></td>
                    <td><a href="script.php?page=films&action=delete&id=<?= $f['id'] ?>">Удалить</a></td>

                </tr>
            <?php endforeach;?>


        </table>
        <br>
        </div>

    </div>
    <div class="row ">
        <div class="col-sm text-center"><a href="script.php?page=films&action=add">Добавить</a></div>
        <div class="col-sm text-center"><a href="index.php">Вернуться на главную панель</a></div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/abddb7a0a4.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
</body>

</html>