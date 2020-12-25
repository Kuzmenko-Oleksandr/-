<?php
require_once("db.php");
require_once('models/films.php');
$link = db_connect();
$film = film_get($link, $_GET['id']);

session_start();
if(isset($_GET['lang']) && !empty($_GET['lang'])){
 $_SESSION['lang'] = $_GET['lang'];
//  setcookie("Selected_lang", $_SESSION['lang'], time()+15552000);
 if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
  echo "<script type='text/javascript'> location.reload(); </script>";
 }
}

if(isset($_SESSION['lang'])){
 include "lang_".$_SESSION['lang'].".php";
}else{
 include "lang_eng.php";
}


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
</head>
<body>
    <script>
        function changeLang(){
        document.getElementById('form_lang').submit();
        }
    </script>

    <div class="header" id="myHeader">
        <a class="active" href="index1.php"><?= _MENU1 ?></a>
        <a href="lab1/report.html"><?= _MENU2 ?></a>
        <a class="report_ref" href="php-auth/index.php" ><?= _MENU3 ?></a>
    </div>
    <p class="title"><?= _TITLE ?></p>
    <form method='get' action='' id='form_lang' >
    <?= _SELECT_LANG ?><select name='lang' onchange='changeLang();' >
            <option value='eng' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'eng'){ echo "selected"; } ?> ><?= _LANG1 ?></option>
            <option value='ukr' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'ukr'){ echo "selected"; } ?> ><?= _LANG2 ?></option>
            <option value='rus' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'rus'){ echo "selected"; } ?> ><?= _LANG3 ?></option>
            </select>
    </form>
    <!-- <p class="cookie"><?= _LANG_SELECTED?><?php echo $_COOKIE["Selected_lang"];?></p> -->
    <p class="cookie"><?= _LANG_SELECTED ?> <?php echo $_GET['lang']; ?></p>
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
                    <h4 class="modal-title"><?= _ENTER1 ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="" class="center" method="POST">
                        <input type="text" name="login" placeholder="<?= _LOGIN ?>" ><br>
                        <input type="password" id="pass" name="password" placeholder="<?= _PASSWORD ?>"><br>
                        <button><a type="submit" class="report_ref" ><?= _ENTER2 ?></a><br></button>
                        <p><?= _ACCOUNT ?></p>
                        <button class="registration"><a href="#myModal2" class="report_ref" data-toggle="modal"><?= _REG1 ?></a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal2" class="modal fade">
        <div class="modal-dialog modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= _REG2 ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="text" name="login" placeholder="<?= _LOGIN ?>">
                        <input type="email" name="email" placeholder="<?= _MAIL ?>" >
                        <input type="password" name="password" placeholder="<?= _PASSWORD ?>" minlength="6" >
                        <input type="password" name="password_2" placeholder="<?= _PASSWORD2 ?>" minlength="6"  >
                        <button class="registr" type="submit" name="do_signup"><a href=""><?= _REG2 ?></a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <p class="title"><?= _SESSIONS ?></p>
    <table>
        <tr>
            <th><?= _SESSION_TYPE ?></th>
            <th><?= _TICKET_PRICE ?></th>
        </tr>
        <tr>
            <td><?= _STANDART ?></td>
            <td><?= _50GRN ?></td>
        </tr>
        <tr>
            <td>3D</td>
            <td><?= _100GRN ?></td>
        </tr>
        <tr>
            <td>IMAX</td>
            <td><?= _150GRN ?></td>
        </tr>
      </table>
    <div class="container">
            <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" aria-label="Search" placeholder="<?= _FILM_SEARCH ?>">
        <table id="myTable" class="table table-bordered table-dark">
            <thead>
            <tr>
                <th><?= _FILM_NAME ?></th>
                <th><?= _FILM_TIME ?></th>
                <th><?= _FILM_DIRECTOR_NAME ?></th>
                <th><?= _FILM_DIRECTOR_SURNAME ?></th>
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
    <div id="81c39916624cc673a85c3126b04a361b"  class="ww-informers-box-854753" style="margin-left: 44%;"><br>
        <p style="" class="ww-informers-box-854754"><a href="https://world-weather.ru/pogoda/ukraine/kyiv/">Подробнее</a>
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
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

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