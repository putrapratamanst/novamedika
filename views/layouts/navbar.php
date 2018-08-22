<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="<?php echo Yii::$app->urlManager->createUrl("/")?>"><marquee>Selamat Datang di Sistem Informasi Klinik  Nova Medika</marquee></a>   
            
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo Yii::$app->urlManager->createUrl('/site/logout')?>"  onclick = "if (!confirm('Apakah anda yakin akan keluar?')) { return false; }">
                        <p>Keluar <b><u>(<?php echo Yii::$app->user->identity->name;?>)</u></b> </p>
                    </a>
                </li>
                <li class="separator hidden-lg"></li>
            </ul>
        </div>
    </div>
</nav>
