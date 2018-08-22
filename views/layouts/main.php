<?php
if ( Yii::$app->user->isGuest)
    return Yii::$app->controller->redirect('/site/login');
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name) ?> <?= isset($this->title)?" | ".$this->title:''?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
        <?php echo Yii::$app->controller->renderPartial('@app/views/layouts/sidemenu')?>
    <div class="main-panel">
        <?php echo Yii::$app->controller->renderPartial('@app/views/layouts/navbar')?>
    <!-- <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?> -->
    <div class="content">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?= Alert::widget() ?>
                            <?= $content ?>
                        </div>
                    </div>
                </div>
     </div>
 </div>

<footer class="footer" style="text-align: center;background-color: #e8e9eb">
    <div class="container-fluid">
        <img src ="<?= Yii::getAlias('@web/theme/') ?>img/navbar_logo.png?>">
    </div>
</footer>
</div>
</div>
 
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
