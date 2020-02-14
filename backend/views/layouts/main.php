<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use kartik\widgets\SideNav;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/navbar-fixed-side.css" rel="stylesheet" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style type="text/css">
                      .sidenav {
                          height: 100%; /* 100% Full-height */
                          width: 0; /* 0 width - change this with JavaScript */
                          position: fixed; /* Stay in place */
                          z-index: 1; /* Stay on top */
                          top: 0;
                          left: 0;
                          background-color: #111; /* Black*/
                          overflow-x: hidden; /* Disable horizontal scroll */
                          padding-top: 60px; /* Place content 60px from the top */
                          transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
                      }

                      /* The navigation menu links */
                      .sidenav a {
                          padding: 8px 8px 8px 32px;
                          text-decoration: none;
                          font-size: 25px;
                          color: #818181;
                          display: block;
                          transition: 0.3s
                      }

                      /* When you mouse over the navigation links, change their color */
                      .sidenav a:hover, .offcanvas a:focus{
                          color: #f1f1f1;
                      }

                      /* Position and style the close button (top right corner) */
                      .sidenav .closebtn {
                          position: absolute;
                          top: 0;
                          right: 25px;
                          font-size: 36px;
                          margin-left: 50px;
                      }

                      /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
                      #main {
                          transition: margin-left .5s;
                          padding: 20px;
                      }

                      /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
                      @media screen and (max-height: 450px) {
                          .sidenav {padding-top: 15px;}
                          .sidenav a {font-size: 18px;}
                      }
                    .sidebar-nav {
                          padding: 9px 0;
                    }

                          @media (max-width: 980px) {
                                  body{
                                          padding-top: 0px;
                                  }
                          }
                  .navbar-custom {

                    background-color: #318bb8;
                    border-color: #2a779e;
                    background-image: -webkit-gradient(linear, left 0%, left 100%, from(#4da4cf), to(#318bb8));
                    background-image: -webkit-linear-gradient(top, #4da4cf, 0%, #318bb8, 100%);
                    background-image: -moz-linear-gradient(top, #4da4cf 0%, #318bb8 100%);
                    background-image: linear-gradient(to bottom, #4da4cf 0%, #318bb8 100%);
                    background-repeat: repeat-x;
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff4da4cf', endColorstr='#ff318bb8', GradientType=0);
                  }
                  .navbar-custom .navbar-brand {
                    color: #ffffff;
                    font-size: 150%;
                  }
                  .navbar-custom .navbar-brand:hover,
                  .navbar-custom .navbar-brand:focus {
                    color: #ffffff;
                    background-color: transparent;
                    font-size: 150%;

                  }
                  .navbar-custom .navbar-text {
                    color: #ffffff;
                  }
                  .navbar-custom .navbar-nav > li:last-child > a {
                    border-right: 1px solid #2a779e;
                  }
                  .navbar-custom .navbar-nav > li > a {
                    color: #ffffff;
                    border-left: 1px solid #2a779e;
                  }
                  .navbar-custom .navbar-nav > li > a:hover,
                  .navbar-custom .navbar-nav > li > a:focus {
                    color: #f5f1f1;
                    background-color: transparent;
                  }
                  .navbar-custom .navbar-nav > .active > a,
                  .navbar-custom .navbar-nav > .active > a:hover,
                  .navbar-custom .navbar-nav > .active > a:focus {
                    color: #f5f1f1;
                    background-color: #2a779e;
                    background-image: -webkit-gradient(linear, left 0%, left 100%, from(#2a779e), to(#3596c6));
                    background-image: -webkit-linear-gradient(top, #2a779e, 0%, #3596c6, 100%);
                    background-image: -moz-linear-gradient(top, #2a779e 0%, #3596c6 100%);
                    background-image: linear-gradient(to bottom, #2a779e 0%, #3596c6 100%);
                    background-repeat: repeat-x;
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff2a779e', endColorstr='#ff3596c6', GradientType=0);
                  }
                  .navbar-custom .navbar-nav > .disabled > a,
                  .navbar-custom .navbar-nav > .disabled > a:hover,
                  .navbar-custom .navbar-nav > .disabled > a:focus {
                    color: #cccccc;
                    background-color: transparent;
                  }
                  .navbar-custom .navbar-toggle {
                    border-color: #dddddd;
                  }
                  .navbar-custom .navbar-toggle:hover,
                  .navbar-custom .navbar-toggle:focus {
                    background-color: #dddddd;
                  }
                  .navbar-custom .navbar-toggle .icon-bar {
                    background-color: #cccccc;
                  }
                  .navbar-custom .navbar-collapse,
                  .navbar-custom .navbar-form {
                    border-color: #29769c;
                  }
                  .navbar-custom .navbar-nav > .dropdown > a:hover .caret,
                  .navbar-custom .navbar-nav > .dropdown > a:focus .caret {
                    border-top-color: #f5f1f1;
                    border-bottom-color: #f5f1f1;
                  }
                  .navbar-custom .navbar-nav > .open > a,
                  .navbar-custom .navbar-nav > .open > a:hover,
                  .navbar-custom .navbar-nav > .open > a:focus {
                    background-color: #2a779e;
                    color: #f5f1f1;
                  }
                  .navbar-custom .navbar-nav > .open > a .caret,
                  .navbar-custom .navbar-nav > .open > a:hover .caret,
                  .navbar-custom .navbar-nav > .open > a:focus .caret {
                    border-top-color: #f5f1f1;
                    border-bottom-color: #f5f1f1;
                  }
                  .navbar-custom .navbar-nav > .dropdown > a .caret {
                    border-top-color: #ffffff;
                    border-bottom-color: #ffffff;
                  }
                  @media (max-width: 767) {
                    .navbar-custom .navbar-nav .open .dropdown-menu > li > a {
                      color: #ffffff;
                    }
                    .navbar-custom .navbar-nav .open .dropdown-menu > li > a:hover,
                    .navbar-custom .navbar-nav .open .dropdown-menu > li > a:focus {
                      color: #f5f1f1;
                      background-color: transparent;
                    }
                    .navbar-custom .navbar-nav .open .dropdown-menu > .active > a,
                    .navbar-custom .navbar-nav .open .dropdown-menu > .active > a:hover,
                    .navbar-custom .navbar-nav .open .dropdown-menu > .active > a:focus {
                      color: #f5f1f1;
                      background-color: #2a779e;
                    }
                    .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a,
                    .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a:hover,
                    .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a:focus {
                      color: #cccccc;
                      background-color: transparent;
                    }
                  }
                  .navbar-custom .navbar-link {
                    color: #ffffff;
                  }
                  .navbar-custom .navbar-link:hover {
                    color: #f5f1f1;
                  }
            </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'ระบบจัดการหลังบ้าน',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-custom',
        ],
    ]);

    if (Yii::$app->user->isGuest) {

        $menuItems[] = ['label' => 'เข้าสู่ระบบ', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'ออกจากระบบ (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
    //    'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

        <?= $content ?>



    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; โรงพยาบาลวิเชียรบุรี พัฒนาต่อโดย พีรกาจ พูลสวัสดิ์ <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

    