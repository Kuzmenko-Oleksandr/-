<?php
require_once("db.php");
require_once('models/films.php');

$link = db_connect();

$film = film_get($link, $_GET['id']);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кінотеатр</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="web_lab5/jquery.floating-social-share.min.js"></script>
    <link rel="stylesheet" href="web_lab5/jquery.floating-social-share.min.css">
   
    <style>
        .php{
            text-align: center;
            color: white;
        }
        * {
            font-family: Helvetica;
        }
    </style>

</head>
<body>

    <div class="header" id="myHeader">
        <a class="active" href="index1.php">Основна</a>
        <a href="lab1/report.html">Звіт</a>
        <a class="report_ref" href="#myModal1" data-toggle="modal">Вхід</a>

    </div>
    <p class="title">Фільми, що актуальні зараз</p>
    <form style="width: 50%" class="search">
            <input type="search" name="search" placeholder="Бажаєте знайти фільм?">
            <button style="width: 20%; border: none; border-radius: 5px; background-color: aquamarine;" type="submit">Пошук фільму</button>
        </form>
<!--    <div class="php">--><?php
//            if (( $search = $_GET['search'])) {
//                $search = $_GET['search'];
//                echo('За вашим запитом "'.$search.'" не знайдено жодного фільму');
//            }
//
//        echo "<hr>Сьогоднi: ";
//        date_default_timezone_set("UTC");
//        $time = time();
//        $offset = 2;
//        $time += 2 * 3600;
//        echo date("d-m-Y H:i:s", $time);
//
//
//        if ($login = $_POST['login']) {
//        $login = $_POST['login'];
//        echo("<br>Ви ввійшли як користувач: ".$login);
//        }
//        $password = $_POST['password'];
//        ?><!--</div>-->

    <div class="slider">
        <div class="slider__wrapper">
          <div class="slider__item">
            <div style="height:  700px;">
                <img src="img/Avatar.jpg" alt="">
            </div>
          </div>
          <div class="slider__item">
            <div style="height: 700px;">
                <img src="img/leon.jpg" alt="">
            </div>
          </div>
          <div class="slider__item">
            <div style="height: 700px;">
                <img src="img/Сутінки.jpg" alt=""> 
            </div>
          </div>
          <div class="slider__item">
            <div style="height: 700px;">
                <img src="img/1917.jpg" alt=""> 
            </div>
          </div>
            <div class="slider__item">
                <div style="height: 700px;">
                    <img src="img/deadpool.jpg" alt="">
                </div>
            </div>
        </div>
        <a class="slider__control slider__control_left" href="#" role="button"></a>
        <a class="slider__control slider__control_right slider__control_show" href="#" role="button"></a>
    </div>

    <div id="myModal1" class="modal fade">
        <div class="modal-dialog modal-l ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Вхід</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="" class="center" method="POST">

                        <input type="text" name="login" placeholder="Логін" ><br>
                        <input type="password" id="pass" name="password" placeholder="Пароль"><br>
                        <button><a type="submit" class="report_ref" >Увійти</a><br></button>
                        <p>Досі не маєте власного акаунту? Зробіть!</p>
                        <button class="registration"><a href="#myModal2" class="report_ref" data-toggle="modal">Зареєструватись</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal2" class="modal fade">
        <div class="modal-dialog modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Реєстрація</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="text" name="login" placeholder="Логін">
                        <input type="email" name="email" placeholder="Почта" >
                        <input type="password" name="password" placeholder="Пароль" minlength="6" >
                        <input type="password" name="password_2" placeholder="Повторіть пароль" minlength="6"  >
                        <button class="registr" type="submit" name="do_signup"><a href="">Зареєструватися</a></button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <p class="title">Види сеансу та ціни на білет</p>
    <table>
        <tr>
            <th>Вид сеансу</th>
            <th>Ціна білету</th>
        </tr>
        <tr>
            <td>Стандарт</td>
            <td>50 грн</td>
        </tr>
        <tr>
            <td>3D</td>
            <td>100 грн</td>
        </tr>
        <tr>
            <td>IMAX</td>
            <td>150 грн</td>
        </tr>
      </table>
<div class="container">
        <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" aria-label="Search" placeholder="Пошук фiльму">
    <table id="myTable" class="table table-bordered table-dark">
        <thead>
        <tr>
            <th>Назва фильму</th>
            <th>Час</th>
            <th>Iмя режисера</th>
            <th>Прiзвище режисера</th>
        </tr>
        </thead>

        <tbody >
        <?php
        foreach($films as $f):?>
        <tr>
            <td><?=$f['name_']?></td>
            <td><?=$f['duration']?></td>
            <td><?=$f['name_director']?></td>
            <td><?=$f['surname_director']?></td>
        </tr>
        </tbody>
        <?php endforeach;?>
    </table>
</div>


    <div id="81c39916624cc673a85c3126b04a361b"  class="ww-informers-box-854753" style="margin-left: 44%;">
        <p style="" class="ww-informers-box-854754"><a href="https://world-weather.ru/pogoda/ukraine/kyiv/">Подробнее</a>
            <br>
            <a href="https://world-weather.ru/">world-weather.ru</a>
        </p>
    </div>
    <div id='kurs-com-ua-informer-main-ukraine-298x130-blue-container' style="text-align: center;padding-top: 20px">
        <a href="//old.kurs.com.ua/informer" id="kurs-com-ua-informer-main-ukraine-298x130-blue" title="Курс валют информер Украина" rel="nofollow" target="_blank">Информер курса валют</a>
    </div>
    <div id="tw_11_316654847">
        <div style="width:120px; height:140px; margin: 0 auto;">
            <a href="https://nochi.com/time/kiev-18881">Киев</a>
            <br/>
        </div>
    </div>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script async type="text/javascript" charset="utf-8" src="https://world-weather.ru/wwinformer.php?userid=81c39916624cc673a85c3126b04a361b">
    </script><style>.ww-informers-box-854754{-webkit-animation-name:ww-informers54;animation-name:ww-informers54;-webkit-animation-duration:1.5s;animation-duration:1.5s;white-space:nowrap;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis;font-size:12px;font-family:Arial;line-height:18px;text-align:center;margin: }@-webkit-keyframes ww-informers54{0%,80%{opacity:0}100%{opacity:1}}@keyframes ww-informers54{0%,80%{opacity:0}100%{opacity:1}}</style>
    <noscript><img src='//old.kurs.com.ua/static/images/informer/kurs.png' width='52' height='26' alt='kurs.com.ua: курс валют в Украине!' title='Курс валют' border='0' /></noscript>
    <script>(function() {var iframe = '<ifr'+'ame src="//old.kurs.com.ua/informer/inf2?color=blue" width="298" height="130" frameborder="0" vspace="0" scrolling="no" hspace="0"></ifr'+'ame>';var container = document.getElementById('kurs-com-ua-informer-main-ukraine-298x130-blue');container.parentNode.innerHTML = iframe;})();
    var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href","//s.bookcdn.com//css/cl/bw-cl-180x170r1.css"); document.getElementsByTagName("head")[0].appendChild(css_file);
    function setWidgetData_316654847(data){ if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = ''; var params = data.results[i]; objMainBlock = document.getElementById('tw_'+params.widget_type+'_'+params.widget_id); if(objMainBlock !== null) objMainBlock.innerHTML = params.html_code; } } } var clock_timer_316654847 = -1; </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/time/info?ver=2&domid=589&type=11&id=316654847&scode=124&city_id=18881&wlangid=20&mode=2&details=0&background=ffffff&color=363636&add_background=ffffff&add_color=333333&head_color=ffffff&border=0&transparent=0">
    </script>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>