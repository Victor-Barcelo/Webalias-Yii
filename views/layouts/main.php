<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="web/css/main.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
            
    <header>
        <div class="jumbotron">
            <div class="container">
                <h1 class="web-title">Bienvenido a Web Alias</h1>
                <p>Web Alias te permite resumir largas direcciones de páginas webs en dos piezas pequeñas de información. Un tag y un código. Comunica tus enlaces de forma rápida, corta y conveniente!</p>
                <ul class="nav nav-pills nav-justified">
                    <li id="btn-search" role="presentation" class="">
                        <a href="#">Consulta un alias</a>
                    </li>
                    <li id="btn-create" role="presentation" class="">
                        <a href="#">Crea tu alias</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <?= $content ?>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Víctor Barceló <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>