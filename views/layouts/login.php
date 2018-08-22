<?php

use yii\helpers\Html;
use app\assets\LoginAsset;
use app\widgets\Alert;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
    <body class="login">
    	<?php $this->beginBody() ?>
            <?php echo Alert::widget() ?>
        	<?php echo $content; ?>

        <img src="">        		
    	<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>