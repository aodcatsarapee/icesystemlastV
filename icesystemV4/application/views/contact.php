<?php $this->load->helper('Datethai');?>
<?php if (!empty($_SESSION['type'])) { ?>
    <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'emp_sale' || $_SESSION['type'] == 'manager') { ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <i class="fa fa-product-hunt fa-1x "> </i> ติดต่อ
                    <small id='water'></small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered" id="contact">
                                            <thead>
                                                <tr>
                                                    <th >ลำดับ</th>
                                                    <th >ชื่อ</th>
                                                    <th >อีเมล์</th>
                                                    <th >เบอร์โทร</th>
                                                    <th >ข้อความ</th>
                                                    <th >ว/ด/ป</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($contact->result() as $contacts){?>
                                                    <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $contacts->contact_name?></td>
                                                    <td><?php echo $contacts->contact_email?></td>
                                                    <td><?php echo $contacts->contact_phone?></td>
                                                    <td><?php echo $contacts->contact_detail?></td>
                                                    <td ><?php echo Datethai($contacts->contact_datasave);?></td>
                                                    </tr>
                                                <?php $i++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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

