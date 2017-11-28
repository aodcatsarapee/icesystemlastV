<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin'){ ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<i class="fa fa-user-o" aria-hidden="true"></i> ผู้ใช้งาน
			<small></small>
		</h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<?php if (isset($error)) : ?>
						<div class="col-md-12">
							<div class="alert alert-danger" role="alert">
								<?= $error ?>
							</div>
						</div>
						<?php endif; ?>
						<div class="table-responsive">
							<table class="table table-bordered table-hover" id="datatable-users-customer">
								<thead>
									<tr>
										<th width="15%" class="text-center">รหัสลูกค้า</th>
										<th>ชื่อ - นามสกุล</th>
										<th width="%">ชื่อผู้ใช้</th>
										<th width="%" style="text-align: center;">สิทธ์การเข้าใช้งาน</th>
										<th width="%" style="text-align: center;">จัดการ</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($customer_user as $customer_users){?>
									<tr>
										<td class="text-center">
											<?php echo $customer_users->customer_id ?>
										</td>
										<td>
											<?php echo $customer_users->customer_fname." ".$customer_users->customer_lname; ?>
										</td>
										<td>
											<?php echo $customer_users->username; ?>
										</td>
										<td class="text-center">ลูกค้า</td>
										<td style="text-align: center;">
											<button type="button" class="btn btn-sm btn-warning btn-xs edit_data_user_customer" id="<?php echo $customer_users->customer_id; ?>">
												<spen class='glyphicon glyphicon-cog'></spen> เเก้ไข</button>
											<button type="button" class="btn btn-sm btn-danger btn-xs delete_data_customer" id="<?php echo $customer_users->customer_id; ?> " data-toggle="modal"
											data-target="#delete_data">
												<spen class='glyphicon glyphicon-trash'> </spen> ลบ</button>
										</td>
									</tr>
									<?php }?>
								</tbody>
							</table>
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


<?php }else{

              unset($_SESSION['username']);
              unset($_SESSION['customer_id']); 
              unset($_SESSION['employee_id']);  
              unset($_SESSION['type']);
              redirect('login','refresh');
        }

     }else{
            redirect('login','refresh');
      }
         ?>

<!-- modal deit User -->

<div class="modal  fade" id="modal-edit-user-customer">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เเก้ไขข้อมูลผู้ใช้งาน</h4>
			</div>
			<div class="modal-body">    
                <form class="form-horizontal" method="POST" id="edit_edit_user_customer" name="edit_edit_user_customer" enctype="multipart/form-data">
				<input class="form-control" type="hidden" name="edit_username_old" id="edit_username_old" >
                <div class="form-group  ">
						<label class="col-sm-3 control-label">รหัสลูกค้า :</label>
						<div class="col-sm-7">
                        <i class="help-block3 text-danger"></i>
							<input class="form-control" type="text" name="edit_customer_id" id="edit_customer_id" readonly>
						</div>
					</div>
                    <div class="form-group  ">
						<label class="col-sm-3 control-label">ชื่อ :</label>
						<div class="col-sm-7">
							<input class="form-control" type="text" name="edit_customer_fname" id="edit_customer_fname" readonly>
						</div>
					</div>
                    <div class="form-group  ">
						<label class="col-sm-3 control-label">นามสกุล :</label>
						<div class="col-sm-7">
							<input class="form-control" type="text" name="edit_customer_lname" id="edit_customer_lname" readonly>
						</div>
					</div>
                    
					<div class="form-group  ">
						<label class="col-sm-3 control-label">ชื่อผู้ใช้งาน :</label>
						<div class="col-sm-7">
							<input class="form-control" type="text" name="edit_username" id="edit_username" >
						</div>
					</div>
					<div class="form-group  ">
						<label class="col-sm-3 control-label">รหัสผู้ใช้งาน :</label>
						<div class="col-sm-7">
							<input class="form-control" type="text" name="edit_password" id="edit_password">
						</div>
					</div>
					<div class="form-group  ">
						<label class="col-sm-3 control-label">ยืนยันรหัสผู้ใช้งาน :</label>
						<div class="col-sm-7">
							<input class="form-control" type="password" name="edit_confirmpassword" id="edit_confirmpassword">
						</div>
					</div>
					<input type="submit" class="btn btn-default" id="insert" value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
				</form>
				<br>
				<br>
			</div>
		</div>
	</div>
</div>

<!-- modal delete -->
<div class="modal modal-danger fade" id="delete_data">
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-body" >


        <h1 align="center" style="margin-bottom: 60px;">ต้องการลบข้อมูลหรือไม่?</h1> 
               
       <div align="center">
       <button type="submit" class="btn  btn-default" id="submit_delete" style="font-size: 20px" >ลบข้อมูล</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 20px">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
.text-danger
{
    color:#DD4B39;
}
</style>