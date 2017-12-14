<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\components\Helper;
use backend\models\Promo;
use backend\models\Product;
use backend\models\Logo;
use yii\web\View;
$this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Html::encode($this->title)?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/theme/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/theme/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/theme/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/theme/') ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/theme/') ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= Yii::getAlias('@web/theme/') ?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="/site/index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b>Admin</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Nova</b>Medika</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            
        
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
        
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
         <!--  <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= Yii::getAlias('@web/uploads/') ?>logo1.png" alt="Product Image" class="user-image">

              <span class="hidden-xs">Nova Medika</span>
            </a>
            <ul class="dropdown-menu">
             
              <li class="user-header">
                <a href="/logo/update/1">
             <center> <img src="<?= Yii::getAlias('@web/uploads/') ?>logo1.png" alt="Product Image" class="img-circle" width="200"></center>
                <a>
               
              </li> -->
       
           <br>
                
                  <!-- <a href="/site/logout" class="btn btn-primary">Sign out</a> -->
              
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
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <img src="<?= Yii::getAlias('@web/uploads/') ?>logo1.png" alt="Product Image" class="img-circle">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="/pasien/index"><i class="fa fa-tags"></i> <span>DATA PASIEN</span></a></li>
      <!--   <li><a href="/event/index"><i class="fa fa-calendar-check-o"></i> <span>Event</span></a></li>
        <li><a href="/news/index"><i class="fa fa-newspaper-o"></i> <span>News</span></a></li>
        <li><a href="/order/index"><i class="fa fa-share"></i> <span>Order</span></a></li>
        <li><a href="/product/index"><i class="fa fa-th"></i> <span>Product</span></a></li>
        <li><a href="/promo/index"><i class="fa fa-angellist"></i> <span>Promo</span></a></li> -->
        <li class="header"></li>

         <li><a href="/site/logout"><i class="fa fa-power-off"></i> <span>KELUAR</span></a></li>

        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li> -->
      </ul>

    </section>
    <!-- /.sidebar -->

  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Admin Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <?= Alert::widget() ?>
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a href="/article/index">

            <span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Article</span>
              <span class="info-box-number">
               </span>
            </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
        <a href="/event/index">

            <span class="info-box-icon bg-red"><i class="fa fa-calendar-check-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Event</span>
              <span class="info-box-number"> 

                </span>
            </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
         <a href="/order/index">

            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Order</span>
              <span class="info-box-number"> 

                </span>
            </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
         <a href="/news/index">
            <span class="info-box-icon bg-yellow"><i class="ion ion-social-designernews-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">News</span>
              <span class="info-box-number">


                </span>
            </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

     

      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
        
          <!-- /.box -->
          <div class="row">
        
            <!-- /.col -->

            
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Articles</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Article</th>

                  </tr>
                  </thead>
                  <tbody>
                     
                  

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="/article/index" class="btn btn-sm btn-danger btn-flat pull-left">View All Article</a>
            </div>
            <!-- /.box-footer -->
          </div>


          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Order Date</th>

                  </tr>
                  </thead>
                  <tbody>
                     

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="/order/index" class="btn btn-sm btn-info btn-flat pull-left">View All Order</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
    
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 
              <ul class="products-list product-list-in-box">
                  
                <li class="item">
                  <div class="product-img">
                    <img src="<?= Yii::getAlias('@web/uploads/') ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                   
                  </div>
                </li>
              </ul>
            </div>

            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="/product/index" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>

          <!-- /.box -->
        </div>
         <div class="col-md-4">
    
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Promos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 
              <ul class="products-list product-list-in-box">
                  
                <li class="item">
                  <div class="product-img">
                    <img src="<?= Yii::getAlias('@web/uploads/') ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="/promo/" class="product-title">
                      <span class="label label-warning pull-right"></span></a>
                    <span class="product-description">
                         
                        </span>
                  </div>
                </li>
              </ul>
            </div>
            
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="/promo/index" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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

<!-- jQuery 3 -->
<script src="<?= Yii::getAlias('@web/theme/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= Yii::getAlias('@web/theme/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= Yii::getAlias('@web/theme/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= Yii::getAlias('@web/theme/') ?>dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?= Yii::getAlias('@web/theme/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?= Yii::getAlias('@web/theme/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= Yii::getAlias('@web/theme/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?= Yii::getAlias('@web/theme/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?= Yii::getAlias('@web/theme/') ?>bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= Yii::getAlias('@web/theme/') ?>dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= Yii::getAlias('@web/theme/') ?>dist/js/demo.js"></script>
</body>
</html>
