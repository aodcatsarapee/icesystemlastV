<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>โรงน้ำเเข็งทวีชัย เชียงใหม่</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>theme/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>theme/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>theme/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>theme/dist/css/AdminLTE.min.css">
   <!-- gb-color style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>theme/dist/css/bg-color.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>theme/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
 <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
 
 <style type="text/css">
    
    body
    {
       font-family: 'Prompt', sans-serif;
    }

    h1
    {
      font-family: 'Prompt', sans-serif;
    }
    h3
    {
        font-family: 'Prompt', sans-serif;
    }

 </style>
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
<body class="hold-transition skin-blue fixed">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>โรงน้ำเเข็งทวีชัย</b></span>
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
          
         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()?>img/<?php echo $employee1['employee_image'];  ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo  $employee1['employee_fname']." ".$employee1['employee_lname'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              
                <img src="<?php echo base_url()?>img/<?php echo $employee1['employee_image'];  ?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo  $employee1['employee_fname']." ".$employee1['employee_lname'] ?> <br>
                  <?php 

                              if($_SESSION['type']=="admin"){

                               echo "ผู้ดูเเลระบบ";

                              } elseif($_SESSION['type']=="manager"){

                                echo "ผู้จัดการ";


                              }elseif($_SESSION['type']=="emp_store"){

                                 echo "พนักงานคลังสินค้า";

                              }elseif($_SESSION['type']=="emp_produce"){

                               echo "พนักงานผลิตสินค้า";

                              }elseif($_SESSION['type']=="emp_sale"){

                                echo "พนักงานขายสินค้า";

                              }elseif($_SESSION['type']=="emp_account"){

                                  echo "พนักงานบัญชี";

                              }elseif($_SESSION['type']=="customers"){

                                 echo "ลูกค้า";
                              }
                       ?>
                </p>
              </li>
              <!-- Menu Body -->
             <!--  <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li> 
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div style="text-align: center;">
                <a href="<?php echo base_url()?>Profile/toProfile" class="btn btn-default btn-flat">Profile</a>
                  <a href="<?php echo base_url()?>login/sign_out" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
          </li>
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
          <img src="<?php echo base_url()?>img/<?php echo $employee1['employee_image'];  ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo  $employee1['employee_fname']." ".$employee1['employee_lname'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" >เมนู</li>
        
      <?php if(@$_SESSION['type']=="admin"){  ?>
        
        <li class="treeview">
          <a href="#" >
            <i class="fa fa-user" ></i> <span>ผู้ใช้งาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>user"  ><i class="fa fa-circle-o"></i> ผู้ใช้งาน</a></li> 
            <li><a href="<?php echo base_url() ?>user_customer"  ><i class="fa fa-circle-o"></i> ลูกค้า</a></li> 
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>คลังสินค้า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>product"><i class="fa fa-circle-o"></i> รายการสินค้า</a></li>
             <li><a href="<?php echo base_url() ?>product/stock"><i class="fa fa-circle-o"></i>สินค้าคงเหลือ</a></li>
              <li><a href="<?php echo base_url() ?>produce"><i class="fa fa-circle-o"></i>สั่งผลิตสินค้า</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>ช่วยตัดสินใจในการผลิต </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>analyze"><i class="fa fa-circle-o"></i> ปริมาณที่เหมาะสมในการผลิต </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>การผลิตสินค้า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>produce_product"><i class="fa fa-circle-o"></i> สินค้าที่ต้องผลิต</a></li>
              <li><a href="<?php echo base_url(); ?>produce_history"> <i class="fa fa-files-o"></i>การผลิตสินค้าวันนี้</a>
               </li>
                <li><a href="<?php echo base_url(); ?>produce_history_m"> <i class="fa fa-files-o"></i>การผลิตสินค้าเดือนนี้</a>
                 </li>
                 <li><a href="<?php echo base_url(); ?>produce_history_y"> <i class="fa fa-files-o"></i>การผลิตสินค้าปีนี้</a>
                  </li>
                 <li>
                   <a href="<?php echo base_url(); ?>produce_history_all"> <i class="fa fa-files-o"></i>การผลิตสินค้าทั้งหมด</a>
                     </li>           
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart "></i>  <span>การขายสินค้า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo base_url(); ?>shopping"><i class="fa fa-circle-o"></i>ขายสินค้า</a></li>
              <li class="sub_menu"><a href="<?php echo base_url(); ?>shopping_show_sell_detail"><i class="fa fa-files-o"></i>การขายสินค้าวันนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>shopping_show_sell_detail_m"><i class="fa fa-files-o"></i>การขายสินค้าเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>shopping_show_sell_detail_y"><i class="fa fa-files-o"></i>การขายสินค้าสินค้าปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>shopping_show_sell_detail_all"><i class="fa fa-files-o"></i>การขายสินค้าทั้งหมด</a>
                            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-shopping-cart "></i> <span> สินค้าที่ลูกค้าสั้งซื้อ </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>order"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อ</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_d"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อวันนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_m"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อเดือนนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_y"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อปีนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_all"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อทั้งหมด</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-money"></i> <span>ลูกหนี้ </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo base_url(); ?>debtor"><i class="fa fa-circle-o"></i>ลูกหนี้</a></li>
             <li class="sub_menu"><a href="<?php echo base_url(); ?>debtor_show_detail"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินวันนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>debtor_show_detail_m"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>debtor_show_detail_y"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>debtor_show_detail_all"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินทั้งหมด</a>
                            </li>
          </ul>
        </li>

           <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span> เวลาการทำงาน </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>work_time/show_Work_time_in_and_out"></i> <i class="fa fa-circle-o"></i>บันทึกเวลาการเข้างาน</a></li>
             <li><a href="<?php echo base_url(); ?>absence"></i> <i class="fa fa-circle-o"></i>บันทึกการขาดงาน</a></li>
             <li><a href="<?php echo base_url(); ?>rest_work"></i> <i class="fa fa-circle-o"></i>บันทึกการลางาน</a></li>
            
                          
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span> เงินเดือน </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>salaly_month"><i class="fa fa-circle-o"></i>เงินเดือน</a></li>
           <!--  <li><a href="<?php echo base_url(); ?>withdrawal"><i class="fa fa-circle-o"></i>ถอนเงินเดือน</a></li> -->
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span> รายรับ - รายจ่าย </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>account"><i class="fa fa-circle-o"></i>รายรับ - รายจ่าย</a></li>
             <li><a href="<?php echo base_url(); ?>account_show_detail_m"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>account_show_detail_y"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>account_show_detail_all"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายทั้งหมด</a>
                            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"> </i><span> ลูกค้า </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>Customer"><i class="fa fa-circle-o"></i>ลูกค้า</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-user"> </i><span> พนักงาน </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>department"><i class="fa fa-circle-o"></i>แผนกงาน</a></li>
             <li><a href="<?php echo base_url(); ?>employee"><i class="fa fa-circle-o"></i>พนักงาน</a></li>
          </ul>
        </li>

          <?php } elseif(@$_SESSION['type']=="manager"){  ?>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>รายงาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <!-- คลังสินค้า -->
          <li><a href="<?php echo base_url() ?>product"><i class="fa fa-files-o"></i>รายการสินค้า</a></li>
             <li><a href="<?php echo base_url() ?>product/stock"><i class="fa fa-files-o"></i>สินค้าคงเหลือ</a></li>
              <!-- <li><a href="<?php echo base_url() ?>produce"><i class="fa fa-circle-o"></i>สั่งผลิตสินค้า</a></li> -->
          <!-- ช่วยตัดสินใจในการผลิต -->
          <li><a href="<?php echo base_url() ?>analyze"><i class="fa fa-files-o"></i>ปริมาณที่เหมาะสมในการผลิต </a></li>
          <!-- การผลิตสินค้า -->
          <!-- <li><a href="<?php echo base_url() ?>produce_product"><i class="fa fa-circle-o"></i> สินค้าที่ต้องผลิต</a></li> -->
          <li><a href="<?php echo base_url(); ?>produce_history"> <i class="fa fa-files-o"></i>การผลิตสินค้าวันนี้</a>
               </li>
                <li><a href="<?php echo base_url(); ?>produce_history_m"> <i class="fa fa-files-o"></i>การผลิตสินค้าเดือนนี้</a>
                 </li>
                 <li><a href="<?php echo base_url(); ?>produce_history_y"> <i class="fa fa-files-o"></i>การผลิตสินค้าปีนี้</a>
                  </li>
                 <li>
                   <a href="<?php echo base_url(); ?>produce_history_all"> <i class="fa fa-files-o"></i>การผลิตสินค้าทั้งหมด</a>
                     </li>  
            <!-- การขายสินค้า -->
             <!-- <li><a href="<?php echo base_url(); ?>shopping"><i class="fa fa-circle-o"></i>ขายสินค้า</a></li> -->
             <li class="sub_menu"><a href="<?php echo base_url(); ?>shopping_show_sell_detail"><i class="fa fa-files-o"></i>การขายสินค้าวันนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>shopping_show_sell_detail_m"><i class="fa fa-files-o"></i>การขายสินค้าเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>shopping_show_sell_detail_y"><i class="fa fa-files-o"></i>การขายสินค้าสินค้าปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>shopping_show_sell_detail_all"><i class="fa fa-files-o"></i>การขายสินค้าทั้งหมด</a>
                            </li>
              <!-- สินค้าที่ลูกค้าสั้งซื้อ -->
            <li><a href="<?php echo base_url(); ?>order_show_d"><i class="fa fa-files-o"></i>สินค้าที่ลูกค้าสั้งซื้อวันนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_m"><i class="fa fa-files-o"></i>สินค้าที่ลูกค้าสั้งซื้อเดือนนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_y"><i class="fa fa-files-o"></i>สินค้าที่ลูกค้าสั้งซื้อปีนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_all"><i class="fa fa-files-o"></i>สินค้าที่ลูกค้าสั้งซื้อทั้งหมด</a></li>
            <!-- ลูกหนี้ -->
           <li><a href="<?php echo base_url(); ?>debtor"><i class="fa fa-files-o"></i>ลูกหนี้</a></li>
             <li class="sub_menu"><a href="<?php echo base_url(); ?>debtor_show_detail"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินวันนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>debtor_show_detail_m"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>debtor_show_detail_y"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>debtor_show_detail_all"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินทั้งหมด</a>
                            </li>
              <!-- เวลาการทำงาน -->
              <li><a href="<?php echo base_url(); ?>work_time/show_Work_time_in_and_out"></i> <i class="fa fa-files-o"></i>บันทึกเวลาการเข้างาน</a></li>
             <li><a href="<?php echo base_url(); ?>absence"></i> <i class="fa fa-files-o"></i>บันทึกการขาดงาน</a></li>
             <li><a href="<?php echo base_url(); ?>rest_work"></i> <i class="fa fa-files-o"></i>บันทึกการลางาน</a></li>
             <!-- เงินเดือน -->
             <li><a href="<?php echo base_url(); ?>salaly_month"><i class="fa fa-files-o"></i>เงินเดือน</a></li>
             <!-- รายรับ - รายจ่าย -->
             <li><a href="<?php echo base_url(); ?>account"><i class="fa fa-files-o"></i>รายรับ - รายจ่าย</a></li>
             <li><a href="<?php echo base_url(); ?>account_show_detail_m"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>account_show_detail_y"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>account_show_detail_all"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายทั้งหมด</a>
                            </li>
              <!-- ลูกค้า -->
              <li><a href="<?php echo base_url(); ?>customer"><i class="fa fa-files-o"></i>ลูกค้า</a></li>
              <!-- พนักงาน -->
               <!-- <li><a href="<?php echo base_url(); ?>department"><i class="fa fa-circle-o"></i>แผนกงาน</a></li> -->
             <li><a href="<?php echo base_url(); ?>employee"><i class="fa fa-files-o"></i>พนักงาน</a></li>
          </ul>
        </li>
           
        
        <li class="treeview">
          <a href="#">
              <i class="fa fa-product-hunt"></i> <span>คลังสินค้า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>product"><i class="fa fa-circle-o"></i> รายการสินค้า</a></li>
             <li><a href="<?php echo base_url() ?>product/stock"><i class="fa fa-circle-o"></i>สินค้าคงเหลือ</a></li>
              <!-- <li><a href="<?php echo base_url() ?>produce"><i class="fa fa-circle-o"></i>สั่งผลิตสินค้า</a></li> -->
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>ช่วยตัดสินใจในการผลิต </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>analyze"><i class="fa fa-circle-o"></i> ปริมาณที่เหมาะสมในการผลิต </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-product-hunt"></i> <span>การผลิตสินค้า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="<?php echo base_url() ?>produce_product"><i class="fa fa-circle-o"></i> สินค้าที่ต้องผลิต</a></li> -->
              <li><a href="<?php echo base_url(); ?>produce_history"> <i class="fa fa-files-o"></i>การผลิตสินค้าวันนี้</a>
               </li>
                <li><a href="<?php echo base_url(); ?>produce_history_m"> <i class="fa fa-files-o"></i>การผลิตสินค้าเดือนนี้</a>
                 </li>
                 <li><a href="<?php echo base_url(); ?>produce_history_y"> <i class="fa fa-files-o"></i>การผลิตสินค้าปีนี้</a>
                  </li>
                 <li>
                   <a href="<?php echo base_url(); ?>produce_history_all"> <i class="fa fa-files-o"></i>การผลิตสินค้าทั้งหมด</a>
                     </li>           
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart "></i>  <span>การขายสินค้า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <!-- <li><a href="<?php echo base_url(); ?>shopping"><i class="fa fa-circle-o"></i>ขายสินค้า</a></li> -->
              <li class="sub_menu"><a href="<?php echo base_url(); ?>shopping_show_sell_detail"><i class="fa fa-files-o"></i>การขายสินค้าวันนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>shopping_show_sell_detail_m"><i class="fa fa-files-o"></i>การขายสินค้าเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>shopping_show_sell_detail_y"><i class="fa fa-files-o"></i>การขายสินค้าสินค้าปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>shopping_show_sell_detail_all"><i class="fa fa-files-o"></i>การขายสินค้าทั้งหมด</a>
                            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-shopping-cart "></i> <span> สินค้าที่ลูกค้าสั้งซื้อ </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>order_show_d"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อวันนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_m"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อเดือนนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_y"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อปีนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_all"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อทั้งหมด</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>ลูกหนี้ </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo base_url(); ?>debtor"><i class="fa fa-circle-o"></i>ลูกหนี้</a></li>
             <li class="sub_menu"><a href="<?php echo base_url(); ?>debtor_show_detail"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินวันนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>debtor_show_detail_m"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>debtor_show_detail_y"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>debtor_show_detail_all"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินทั้งหมด</a>
                            </li>
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span> เวลาการทำงาน </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>work_time/show_Work_time_in_and_out"></i> <i class="fa fa-circle-o"></i>บันทึกเวลาการเข้างาน</a></li>
             <li><a href="<?php echo base_url(); ?>absence"></i> <i class="fa fa-circle-o"></i>บันทึกการขาดงาน</a></li>
             <li><a href="<?php echo base_url(); ?>rest_work"></i> <i class="fa fa-circle-o"></i>บันทึกการลางาน</a></li>
            
                          
          </ul>
        </li>



          <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span> เงินเดือน </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>salaly_month"><i class="fa fa-circle-o"></i>เงินเดือน</a></li>
           <!--  <li><a href="<?php echo base_url(); ?>withdrawal"><i class="fa fa-circle-o"></i>ถอนเงินเดือน</a></li> -->
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span> รายรับ - รายจ่าย </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>account"><i class="fa fa-circle-o"></i>รายรับ - รายจ่าย</a></li>
             <li><a href="<?php echo base_url(); ?>account_show_detail_m"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>account_show_detail_y"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>account_show_detail_all"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายทั้งหมด</a>
                            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span> ลูกค้า </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>customer"><i class="fa fa-circle-o"></i>ลูกค้า</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span> พนักงาน </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="<?php echo base_url(); ?>department"><i class="fa fa-circle-o"></i>แผนกงาน</a></li> -->
             <li><a href="<?php echo base_url(); ?>employee"><i class="fa fa-circle-o"></i>พนักงาน</a></li>
          </ul>
        </li>
      <?php }elseif(@$_SESSION['type']=="emp_store"){ ?>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>คลังสินค้า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>product"><i class="fa fa-circle-o"></i> รายการสินค้า</a></li>
             <li><a href="<?php echo base_url() ?>product/stock"><i class="fa fa-circle-o"></i>สินค้าคงเหลือ</a></li>
              <li><a href="<?php echo base_url() ?>produce"><i class="fa fa-circle-o"></i>สั่งผลิตสินค้า</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>ช่วยตัดสินใจในการผลิต </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>analyze"><i class="fa fa-circle-o"></i> ปริมาณที่เหมาะสมในการผลิต </a></li>
          </ul>
        </li
      <?php }elseif($_SESSION['type']=="emp_produce"){  ?>
               <li class="treeview">
                  <a href="#">
                    <i class="fa fa-product-hunt"></i> <span>การผลิตสินค้า</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>produce_product"><i class="fa fa-circle-o"></i> สินค้าที่ต้องผลิต</a></li>
                      <li><a href="<?php echo base_url(); ?>produce_history"> <i class="fa fa-files-o"></i>การผลิตสินค้าวันนี้</a>
                       </li>
                        <li><a href="<?php echo base_url(); ?>produce_history_m"> <i class="fa fa-files-o"></i>การผลิตสินค้าเดือนนี้</a>
                         </li>
                         <li><a href="<?php echo base_url(); ?>produce_history_y"> <i class="fa fa-files-o"></i>การผลิตสินค้าปีนี้</a>
                          </li>
                         <li>
                           <a href="<?php echo base_url(); ?>produce_history_all"> <i class="fa fa-files-o"></i>การผลิตสินค้าทั้งหมด</a>
                             </li>           
          </ul>
        </li>

      <?php }elseif($_SESSION['type']=="emp_sale"){?>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart "></i>  <span>การขายสินค้า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo base_url(); ?>shopping"><i class="fa fa-circle-o"></i>ขายสินค้า</a></li>
              <li class="sub_menu"><a href="<?php echo base_url(); ?>shopping_show_sell_detail"><i class="fa fa-files-o"></i>การขายสินค้าวันนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>shopping_show_sell_detail_m"><i class="fa fa-files-o"></i>การขายสินค้าเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>shopping_show_sell_detail_y"><i class="fa fa-files-o"></i>การขายสินค้าสินค้าปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>shopping_show_sell_detail_all"><i class="fa fa-files-o"></i>การขายสินค้าทั้งหมด</a>
                            </li>
          </ul>
        </li>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart "></i>  <span> สินค้าที่ลูกค้าสั้งซื้อ </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>order"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อ</a></li>
            <li><a href="<?php echo base_url(); ?>order_show_d"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อวันนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_m"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อเดือนนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_y"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อปีนี้</a></li>
           <li><a href="<?php echo base_url(); ?>order_show_all"><i class="fa fa-circle-o"></i>สินค้าที่ลูกค้าสั้งซื้อทั้งหมด</a></li>
          </ul>
        </li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span> ลูกค้า </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>customer"><i class="fa fa-circle-o"></i>ลูกค้า</a></li>
          </ul>
        </li>
        
          
      <?php }elseif($_SESSION['type']=="emp_account"){?>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span> รายรับ - รายจ่าย </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>account"><i class="fa fa-circle-o"></i>รายรับ - รายจ่าย</a></li>
             <li><a href="<?php echo base_url(); ?>account_show_detail_m"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>account_show_detail_y"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>account_show_detail_all"><i class="fa fa-files-o"></i>รายรับ - รายจ่ายทั้งหมด</a>
                            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>ลูกหนี้ </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo base_url(); ?>debtor"><i class="fa fa-circle-o"></i>ลูกหนี้</a></li>
             <li class="sub_menu"><a href="<?php echo base_url(); ?>debtor_show_detail"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินวันนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>debtor_show_detail_m"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินเดือนนี้</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>debtor_show_detail_y"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินปีนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>debtor_show_detail_all"><i class="fa fa-files-o"></i>ลูกหนี้ที่ชำระเงินทั้งหมด</a>
                            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span> พนักงาน </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>department"><i class="fa fa-circle-o"></i>แผนกงาน</a></li>
             <li><a href="<?php echo base_url(); ?>employee"><i class="fa fa-circle-o"></i>พนักงาน</a></li>
          </ul>
        </li>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span> เวลาการทำงาน </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>work_time/show_Work_time_in_and_out"></i> <i class="fa fa-circle-o"></i>บันทึกเวลาการเข้างาน</a></li>
             <li><a href="<?php echo base_url(); ?>absence"></i> <i class="fa fa-circle-o"></i>บันทึกการขาดงาน</a></li>
             <li><a href="<?php echo base_url(); ?>rest_work"></i> <i class="fa fa-circle-o"></i>บันทึกการลางาน</a></li>
            
                          
          </ul>
        </li>



          <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span> เงินเดือน </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>salaly_month"><i class="fa fa-circle-o"></i>เงินเดือน</a></li>
           <!--  <li><a href="<?php echo base_url(); ?>withdrawal"><i class="fa fa-circle-o"></i>ถอนเงินเดือน</a></li> -->
          </ul>
        </li>


      <?php }?>

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()?>">