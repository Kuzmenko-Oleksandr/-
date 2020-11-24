<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блок1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <h1 class="text-center">Таблица цен</h1>
    <div class="row">


        <form method="POST" action="script.php?page=films&action=<?= $_GET['action'] ?>&id=<?= $_GET['id'] ?>" style="margin-top: 50px;" >

            <label for="title"><p>Найменування товару(марка, модель)</p>
                <input type="text" name='name_' class="form-item"   style="width: 500px" value="<?=$film['name_']?>" autofocus required>
            </label>
            <br>
            <label for="title"><p>Найменування товару(марка, модель)</p>
                <input type="text" name='duration' class="form-item"   style="width: 500px" value="<?=$film['duration']?>" autofocus required>
            </label>
            <br>
            <label for="title"><p>Найменування товару(марка, модель)</p>
                <input type="text" name='name_director' class="form-item"   style="width: 500px" value="<?=$film['name_director']?>" autofocus required>
            </label>
            <br>
            <label for="title"><p>Найменування товару(марка, модель)</p>
                <input type="text" name='surname_director' class="form-item"   style="width: 500px" value="<?=$film['surname_director']?>" autofocus required>
            </label>
            <br>


            <input style="border: 1px solid black;" type="submit" value="Сохранить" class="btn">


        </form>

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