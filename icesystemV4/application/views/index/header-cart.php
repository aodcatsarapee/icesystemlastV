


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url(); ?>css/freelancer.min.css" rel="stylesheet">

    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

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
        a{
            font-family: 'Mitr', sans-serif;
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
                    <a href="<?php echo base_url();?>index">หน้าเเรก</a>
                </li>
               
                <li class="page-scroll">
                    <a href="#cart">ตะกร้าสินค้า (

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

                    } ?>
                        

                    )
                    </a>
                </li>
                <li class="page-scroll">
                    <a href="#order">สินค้าที่สั่งซื้อ</a>
                </li>
                 <li class="page-scroll">
                    <a href="#Customter">ข้มูลมูลใช้</a>
                </li>
                <li class="page-scroll">
                    <a href="<?php echo base_url();?>login/sign_out_customer">ออกจากระบบ</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->

<?php   



 ?>