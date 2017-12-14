<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\web\View;
use backend\models\Logo;

$this->beginPage() ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <?= Html::csrfMetaTags() ?>

  <title><?php echo Html::encode($this->title)?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/theme/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/theme/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/theme/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/theme/') ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/theme/') ?>dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php $this->head() ?>

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/site/index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b>Admin</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Nova</b>Medika</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
           
            
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            
          
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             
               <span class="hidden-xs">Nova Medika</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <a href="/logo/update/1">
                <a>
               
              </li>
              <!-- Menu Body -->
             <!--  -->
              <!-- Menu Footer-->
                 <br>
                  <a href="/site/logout" class="btn btn-primary">Sign out</a>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
           <img src="<?= Yii::getAlias('@web/uploads/') ?>logo1.png" alt="Product Image" class="img-circle">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="/article/index"><i class="fa fa-tags"></i> <span>Article</span></a></li>
        <li><a href="/event/index"><i class="fa fa-calendar-check-o"></i> <span>Event</span></a></li>
        <li><a href="/news/index"><i class="fa fa-newspaper-o"></i> <span>News</span></a></li>
        <li><a href="/order/index"><i class="ion ion-ios-cart"></i> <span>Order</span></a></li>
        <li><a href="/product/index"><i class="fa fa-th"></i> <span>Product</span></a></li>
        <li><a href="/promo/index"><i class="fa fa-angellist"></i> <span>Promo</span></a></li>
       
      </ul>

<?php
$this->RegisterJS("
   
    $('li').click(function(){
      $('li',$(this).parent()).removeClass('active');
      $(this).addClass('active')
    });
    
    ", View::POS_END);
?>  
    <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
<br>
      <ol class="breadcrumb">
<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
      </ol>


    </section>

    <!-- Main content -->
    <section class="content container-fluid">
<br>

                            <?= Alert::widget() ?>


                <?php echo $content; ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Bocah Tembalang</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?= Yii::getAlias('@web/theme/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= Yii::getAlias('@web/theme/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= Yii::getAlias('@web/theme/') ?>dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
 <?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
