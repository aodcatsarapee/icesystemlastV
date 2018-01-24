<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>โรงน้ำเเข็งทวีชัย เชียงใหม่</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url(); ?>css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">

    <style>
        body {
            font-family: 'Mitr', sans-serif;
        }
        
         .circle { 
            width: 200px; /* ความกว้าง */
            height: 200px; /* ความสูง */
            background: red; /* สี */
            -moz-border-radius: 100px; 
            -webkit-border-radius: 100px; 
            border-radius: 100px;
            }
        

    </style>
</head>



</head>

<body id="page-top" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom" style="font-family: 'Mitr', sans-serif;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">ห้างหุ่นส่วนจำกัด โรงน้ำเเข็งธวีชัย</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="#index">หน้าเเรก</a>
                </li>
                <li class="page-scroll">
                    <a href="#portfolio">สินค้า</a>
                </li>
                <li class="page-scroll">
                    <a href="#about">เกี่ยวกับเรา</a>
                </li>
                <li class="page-scroll">
                    <a href="#contact">ติดต่อ</a>
                </li>
                <li class="page-scroll">
                    <a href="#map">เเผนที่</a>
                </li>

               <?php if(!empty($_SESSION['type'])){ ?>

               <?php if( $_SESSION['type']=='customers'){ ?>
               
                <li class="page-scroll">
                    <a href="<?php echo base_url()?>index/cart">ตะกร้าสินค้า (

                     <?php $total = 0;

                        if(count(@$_SESSION['ses_cart_pro_id'])== null){

                            echo $total = 0; ;
                        }else{


                     foreach ($_SESSION['ses_cart_pro_id'] as $value) {
                        $total+= 1;
                        
                         if ($value === end($_SESSION['ses_cart_pro_id'])) {
                                        echo $total ;
                                    }
                    } 

                    }?>

                     )</a>
                </li>
                   <?php } ?>

                    <li class="page-scroll">
                        <a href="<?php echo base_url();?>login/sign_out_customer">ออกจากระบบ</a>
                    </li>

                   <?php  }else{ 
                            
                        $disabled="disabled";

                    ?>

                <li class="page-scroll">
                    <a href="<?php echo base_url();?>login">ลงชื่อเข้าใช้</a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->

<section id="index" style="padding-bottom: 0px;">
    <header class="masthead">
      <div class="container-fluid" style="padding-top: 150px;padding-bottom: 150px; background-image: url(<?php echo base_url(); ?>img/v7.jpg);height:600px;  background-repeat: repeat-y;">
        <!-- <img class="img-fluid circle" src="<?php echo base_url(); ?>img/123.jpg" alt="" width="200" style="margin-top: 100px;"> -->
        <br />
        <br />
        <br />
        <div class="intro-text" >
          <span class="name" style=" font-family: 'Mitr', sans-serif;">ยินดีต้อนรับ</span>
          <hr class="star-light">
         <span class="skills" style="font-size:40px;">ห้างหุ่นส่วนจำกัด โรงน้ำเเข็งธวีชัย ยินดีให้บริการ </span>
        </div>
      </div>
    </header>
</section>


