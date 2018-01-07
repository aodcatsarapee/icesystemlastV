<?php if (!empty($_SESSION['type'])) { ?>
    <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'emp_store' || $_SESSION['type'] == 'manager') { ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <i class="fa fa-product-hunt fa-1x "> </i> ปริมาณที่เหมาะสมในการผลิต
                    <small id='water'></small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <div class="col-md-4 form-inline">
                                    <label for="">ชื่อสินค้า : </label>
                                    <select name="product_id" id="product_id" class="form-control" required="required" onchange="get_analyze()">
                                        <?php foreach ($get_product as $products) { ?>
                                            <option value="<?php echo $products->product_id."-".$products->product_type."-".$products->product_name ?>"><?php echo $products->product_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <section class="content">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="box box-success text-center" style="min-height: 600px">
                                                        <div class="box-header " style="background:#00a65a; font-size: 20px;color: #fff;">
                                                            <i class="fa fa-check" aria-hidden="true"> </i> รายวัน
                                                        </div>
                                                        <div class="circle circle-success text-center"><div class="text-center text-circle" id="get_d"></div></div>
                                                        <h3 style="margin-top: 100px" id="get_type">กระสอบ</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-4">
                                        <section class="content">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="box box-warning text-center" style="min-height: 600px">
                                                        <div class="box-header " style="background:#f39c12; font-size: 20px;color: #fff;">
                                                            <i class="fa fa-check" aria-hidden="true"> </i> รายสัปดาห์
                                                        </div>
                                                        <div class="circle circle-warning text-center"><div class="text-center text-circle" id="get_w" ></div></div>
                                                        <h3 style="margin-top: 100px" id="get_type1">กระสอบ</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-4">
                                        <section class="content">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="box box-danger text-center" style="min-height: 600px">
                                                        <div class="box-header " style="background:#f56954; font-size: 20px;color: #fff;">
                                                            <i class="fa fa-check" aria-hidden="true"> </i> รายเดือน
                                                        </div>
                                                        <div class="circle circle-danger text-center"> <div class="text-center text-circle" id="get_m"></div></div>
                                                        <h3 style="margin-top: 100px" id="get_type2">กระสอบ</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>

                                    <a href="#" target="_blank" id="print_analyze" class="btn btn-success" style="float: right; font-size: 18px"> <i class="fa fa-print" aria-hidden="true"></i> พิมพ์</a>
                            </div>
                            <!-- /.box-body -->
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

        <style>
            .circle {
                width: 200px; /* ความกว้าง */
                height: 200px; /* ความสูง */
                -moz-border-radius: 100px;
                -webkit-border-radius: 100px;
                border-radius: 100px;
                margin: auto;
                margin-top: 30%;*/
                /*margin-left:50%;*/
            opacity: 0.9;
            }
            .circle-success{
                background:#00a65a ; /* สี */
            }
            .circle-warning{
                background:#f39c12 ; /* สี */
            }
            .circle-danger{
                background:#f56954 ; /* สี */
            }
            .text-circle {
                padding-top: 30%;
                font-size: 50px;
                color: #fff;
            }

        </style>

    <?php } else {
        unset($_SESSION['username']);
        unset($_SESSION['customer_id']);
        unset($_SESSION['employee_id']);
        unset($_SESSION['type']);
        redirect('login', 'refresh');
    }
} else {
    redirect('login', 'refresh');
}
?>

