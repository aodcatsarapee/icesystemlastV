<?php if (!empty($_SESSION['type'])) { ?>
    <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'emp_account'  || $_SESSION['type']=='manager') { ?>

 <?php require("set_date/form_set.php") ?>

<?php require("modal/modal-select-date.php") ?>

<?php require("modal/modal-alert-select-date.php") ?>

<?php require("modal/modal-alert-error-date.php") ?>




        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                <i class="fa fa-money"> </i> บันทึกเวลาการทำงาน
                <button type="button" class="btn btn-success btn-xs " id="insert"  data-toggle="modal" data-target="#modal-select-date" style="float: right;font-size: 20px;"><spen class="glyphicon glyphicon-plus"> </spen> เลือกวันที่ </button>

                </h1>

                 


            </section>



            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Small boxes (Stat box) -->


                        <div class="box">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Custom Tabs -->
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab_1"
                                                                      data-toggle="tab">บันทึกเวลาเข้างาน</a></li>
                                                <li><a href="#tab_2" data-toggle="tab">เวลาเข้างานวันนี้</a></li>
                                                <li><a href="#tab_3" data-toggle="tab">เวลาออกงานวันนี้</a></li>


                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover "
                                                               id="table_worrk">
                                                            <thead>
                                                            <tr>
                                                                <th width="10%" style="text-align: center;">รูป</th>
                                                                <th width="10%" style="text-align: center;">
                                                                    รหัสพนักงาน
                                                                </th>
                                                                <th >ชื่อพนักงาน</th>
                                                                <th width="10%" >เเผนก</th>


                                                                <th width="8%" style="text-align: center;">เข้างาน</th>
                                                                <th width="5%" style="text-align: center;">ออกงาน</th>

                                                                <!--   <th width="10%">เวลาเข้างาน</th>
                                                                  <th width="10%">ลงเวลาเข้างาน</th> -->

                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php if ($this->session->flashdata('worktimesave') != null) { ?>
                                                                <div class="alert alert-success">
                                                                    <a href="#" class="close" data-dismiss="alert"
                                                                       aria-label="close">&times;</a>

                                                                        <p style="font-size: 15pt"> <?php echo $this->session->flashdata('worktimesave'); ?> </p>

                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($this->session->flashdata('inworktime') != null) { ?>
                                                                <div class="alert alert-danger">
                                                                    <a href="#" class="close" data-dismiss="alert"
                                                                       aria-label="close">&times;</a>

                                                                        <p style="font-size: 15pt"> <?php echo $this->session->flashdata('inworktime'); ?> </p>

                                                                </div>
                                                                
                    
                                                            <?php } ?>



                                                            <?php foreach ($employee as $key => $value) { ?>


                                                                <!-- <?php foreach ($worktime as $key => $worktimes) { ?>

                            <?php if ($value['employee_id'] == $worktimes['Employee_id']) {
                                                                    echo($worktimes['Employee_id']); ?>


                         <?php }
                                                                } ?>   -->


                                                                <tr>
                                                                    <td style="text-align: center; "><img
                                                                                src="<?php echo base_url() ?>img/<?php echo $value['employee_image']; ?>"
                                                                                width="80" height="80"></td>
                                                                    <td style="text-align: center;padding-top: 30px;">
                                                                        <?php echo $value['employee_id']; ?></td>
                                                                    <td style="padding-top: 30px; "><?php echo $value['employee_fname'] . " " . $value['employee_lname']; ?></td>
                                                                    <td style="padding-top: 30px;"><?php echo $value['name']; ?></td>

                                                                    <form action="<?php echo base_url() ?>Work_time/insert_date_in"
                                                                          method="POST">


                                                                        <input type="hidden" name="employee_id"
                                                                               class="form-control"
                                                                               value="<?php echo $value['employee_id']; ?>">

                                                                        <td style="text-align: center;padding-top: 30px;">
                                                                            <?php if($_SESSION['type']!='manager'){?>
                                                                            <button type="submit"
                                                                                    class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                                                เข้างาน
                                                                            </button>
                                                                            <?php }else{?>
                                                                                <button type="submit"
                                                                                    class="btn btn-success btn-xs" disabled> <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>
                                                                                เข้างาน
                                                                            </button>
                                                                            <?php }?>
                                                                    </form>

                                                                    <form action="<?php echo base_url() ?>Work_time/insert_date_out"
                                                                          method="POST">

                                                                        <input type="hidden" name="employee_id"
                                                                               class="form-control"
                                                                               value="<?php echo $value['employee_id']; ?>">

                                                                        <td style="text-align: center;padding-top: 30px;">
                                                                        <?php if($_SESSION['type']!='manager'){?>
                                                                            <button type="submit"
                                                                                    class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ออกงาน
                                                                            </button>
                                                                            <?php }else{?>
                                                                                <button type="submit"
                                                                                    class="btn btn-danger btn-xs" disabled> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ออกงาน
                                                                            </button>
                                                                                <?php }?>
                                                                    </form>
                                                                    <!--  <td style="text-align: center; padding-top: 30px;">

                           <input type="time" name="Worktime_time_in" class="form-control" value="00:00">

                           <input type="hidden" name="employee_id" class="form-control" value="<?php echo $value['employee_id']; ?>">

                           </td> -->
                                                                    <!--  <td style="text-align: center;padding-top: 30px;">

                                                                        <button type="submit" class="btn btn-success btn-xs" >บันทึกข้อมูล</button> -->
                                                                    </form>

                                                                    </td>

                                                                </tr>

                                                            <?php } ?>

                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div>
                                                <!-- /.tab-pane -->
                                                <div class="tab-pane" id="tab_2">
                                                    <table class="table table-hover" id="table_worrk2">
                                                        <thead>
                                                        <tr>

                                                            <th style="text-align: center;padding-top: 30px;">รูป</th>
                                                            <th style="text-align: center;padding-top: 30px;"  >รหัสพนักงาน</th>
                                                            <th style="text-align: center;padding-top: 30px;">ชื่อพนักงาน</th>
                                                            <th style="text-align: center;padding-top: 30px;" >สถานะ</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($worktime as $key => $worktimes) { ?>
                                                            <tr>

                                                                <td style="text-align: center; "><img
                                                                            src="<?php echo base_url() ?>img/<?php echo $worktimes['employee_image']; ?>"
                                                                            width="80" height="80"></td>
                                                                <td style="text-align: center;padding-top: 30px;"><?php echo $worktimes['employee_id'] ?></td>
                                                                <td style="text-align: center;padding-top: 30px;"><?php echo $worktimes['employee_fname'] . " " . $worktimes['employee_lname'] ?></td>
                                                                <?php if ($worktimes['date'] == null) { ?>

                                                                    <!-- <td><?php echo $worktimes['date'] ?></td> -->
                                                                    <td style="text-align: center;padding-top: 30px;">
                                                                        ยังไม่เข้างาน
                                                                    </td>


                                                                <?php } else { ?>
                                                                    <td style="text-align: center;padding-top: 30px;">

                                                                        <span class="label label-success">เข้างานแล้ว</span>
                                                                    </td>
                                                                <?php } ?>


                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.tab-pane -->
                                                <div class="tab-pane" id="tab_3">


                                                    <div class="table-responsive">
                                                        <table class="table  table-hover"
                                                               id="table_worrk3">
                                                            <thead>
                                                            <tr>
                                                                <th style="text-align: center;padding-top: 30px;">รูป
                                                                </th>
                                                                <th style="text-align: center;padding-top: 30px;">รหัสพนักงาน
                                                                </th>
                                                                <th style="text-align: center;padding-top: 30px;">ชื่อพนักงาน
                                                                </th>
                                                                <th style="text-align: center;padding-top: 30px;">สถานะ
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($worktime as $key => $worktimes) { ?>
                                                                <tr>
                                                                    <td style="text-align: center; "><img
                                                                                src="<?php echo base_url() ?>img/<?php echo $worktimes['employee_image']; ?>"
                                                                                width="80" height="80"></td>
                                                                    <td style="text-align: center;padding-top: 30px;"><?php echo $worktimes['employee_id'] ?></td>
                                                                    <td style="text-align: center;padding-top: 30px;"><?php echo $worktimes['employee_fname'] . " " . $worktimes['employee_lname'] ?></td>
                                                                    <?php if ($worktimes['Worktime_time_out'] == null) { ?>


                                                                        <td style="text-align: center;padding-top: 30px;">
                                                                            ยังไม่ได้ออกงาน
                                                                        </td>


                                                                    <?php } else { ?>
                                                                        <td style="text-align: center;padding-top: 30px;">

                                                                            <span class="label label-danger">ออกงานแล้ว</span>
                                                                        </td>
                                                                    <?php } ?>
                                                                    <!-- <td><?php echo $worktimes['Worktime_time_out'] ?></td> -->
                                                                </tr>
                                                            <?php } ?>
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
        unset($_SESSION['Customer_id']);
        unset($_SESSION['employee_id']);
        unset($_SESSION['type']);
        redirect('login', 'refresh');
    }
} else {
    redirect('login', 'refresh');
}
?>