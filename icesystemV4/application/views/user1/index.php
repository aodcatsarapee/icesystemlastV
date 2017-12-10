<?php if(!empty($_SESSION['type'])){ ?>
<?php if($_SESSION['type']=='admin'){ ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<i class="fa fa-user-o" aria-hidden="true"></i> ผู้ใช้งาน
			<small></small>
			<button type="button" class="btn btn-success btn-xs " id="insert" data-toggle="modal" data-target="#modal-insert-user" style="float: right;font-size: 20px;">
				<spen class="glyphicon glyphicon-plus"> </spen> ผู้ใช้งาน </button>
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

                        <table class="table table-bordered table-hover" id="datatable-users">
            <thead>
              <tr>
              <th width="15%" class="text-center">รหัสพนักงาน</th>
                 <th>ชื่อ - นามสกุล</th>
                 <th width="%">ชื่อผู้ใช้</th>
                 <th width="%" style="text-align: center;">สิทธ์การเข้าใช้งาน</th>
                 <th width="%" style="text-align: center;">จัดการ</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($emp_user as $value) {
              # code...
             ?>
              <tr>
              <td class="text-center"><?php echo $value->employee_id;?></td>
                  <td><?php echo $value->employee_fname." ".$value->employee_lname;?></td>
                  <td><?php echo $value->username;?></td>
                  <td style="text-align: center;" >
                    

                      <?php 

                              if($value->user_type=="admin"){

                               echo "ผู้ดูเเลระบบ";

                              } elseif($value->user_type=="manager"){

                                echo "ผู้จัดการ";

                              }elseif($value->user_type=="emp_store"){

                                 echo "พนักงานคลังสินค้า";

                              }elseif($value->user_type=="emp_produce"){

                               echo "พนักงานผลิตสินค้า";

                              }elseif($value->user_type=="emp_sale"){

                                echo "พนักงานขายสินค้า";

                              }elseif($value->user_type=="emp_account"){

                                  echo "พนักงานบัญชี";
                              }
                       ?>

                  </td>
                  <td style="text-align: center;">
                    <button type ="button" class="btn btn-sm btn-warning btn-xs edit_data_user"   id="<?php echo $value->employee_id; ?>"><spen class='glyphicon glyphicon-cog'></spen> เเก้ไข</button>
                      <button type ="button" class="btn btn-sm btn-danger btn-xs delete_dataa"  id="<?php echo $value->employee_id; ?> " data-toggle="modal" data-target="#delete_data"><spen class='glyphicon glyphicon-trash'> </spen> ลบ</button>
                  </td>

              </tr>
            <?php } ?>
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
              unset($_SESSION['Customer_id']); 
              unset($_SESSION['employee_id']);  
              unset($_SESSION['type']);
              redirect('login','refresh');
        }

     }else{
            redirect('login','refresh');
      }
         ?>
<div class="modal  fade" id="modal-insert-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เพิ่มผู้ใช้งาน</h4>
			</div>
			<div class="modal-body">    
            <div class="form-horizontal">
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">เลือกพนักงาน :</label>
                        <div class="col-sm-7">
                        <i class="help-block"></i>
                        <i class="help-block1 text-danger"></i>
                            <!-- <input class="form-control" type="number" name="search_employee" id="search_employee" style="margin-bottom:2px;" placeholder="กรอกรหัสพนักงาน "> -->
							
							<select  class="form-control" name="search_employee" id="search_employee" >
							<option value="0">เลือก</option>
	  						<?php  foreach($get_employee as $emp){?>
								<option value="<?php echo $emp->employee_id?>"><?php echo $emp->employee_fname." ".$emp->employee_lname?></option>
							  <?php }?>
							</select>
							
                            <center><a class="btn btn-default float-center btn-block" onclick="search_employee()">ตรวจสอบ</a> </center>
                        </div>
                    </div>
            </div>
                <form class="form-horizontal" method="POST" id="insert_form_user" name="insert_form_user" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="employee_id" id="employee_id" >
                    <div class="form-group  ">
						<label class="col-sm-3 control-label">ชื่อ :</label>
						<div class="col-sm-7">
							<input class="form-control" type="text" name="employee_fname" id="employee_fname" readonly>
						</div>
					</div>
                    <div class="form-group  ">
						<label class="col-sm-3 control-label">นามสกุล :</label>
						<div class="col-sm-7">
							<input class="form-control" type="text" name="employee_lname" id="employee_lname" readonly>
						</div>
					</div>
                    <div class="form-group  ">
						<label class="col-sm-3 control-label">เเผนก :</label>
						<div class="col-sm-7">
							<input class="form-control" type="text" name="department" id="department" readonly>
						</div>
					</div>
                    
					<div class="form-group  ">
						<label class="col-sm-3 control-label">ชื่อผู้ใช้งาน :</label>
						<div class="col-sm-7">
							<input class="form-control" type="text" name="username" id="username" >
						</div>
					</div>
					<div class="form-group  ">
						<label class="col-sm-3 control-label">รหัสผู้ใช้งาน :</label>
						<div class="col-sm-7">
							<input class="form-control" type="password" name="password" id="password">
						</div>
					</div>
					<div class="form-group  ">
						<label class="col-sm-3 control-label">ยืนยันรหัสผู้ใช้งาน :</label>
						<div class="col-sm-7">
							<input class="form-control" type="password" name="confirmpassword" id="confirmpassword">
						</div>
					</div>
					<div class="form-group  ">
						<label class="col-sm-3 control-label">ประเภทผู้ใช้งาน :</label>
						<div class="col-sm-7">
							<select name="type" id="input" class="form-control">
								<option value="">เลือกประเภทผู้ใช้งาน</option>
								<option value="admin">ผู้ดูเเลระบบ</option>
								<option value="manager">ผู้จัดการ</option>
								<option value="emp_store">พนักงานคลังสินค้า</option>
								<option value="emp_produce">พนักงานผลิตสินค้า</option>
								<option value="emp_sale">พนักงานขายสินค้า</option>
								<option value="emp_account">พนักงานบัญชี</option>
							</select>
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


<!-- modal deit User -->

<div class="modal  fade" id="modal-edit-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เเก้ไขข้อมูลผู้ใช้งาน</h4>
			</div>
			<div class="modal-body" id="user_emp_edit">    
            <div class="form-horizontal">
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">ค้นหาพนักงาน :</label>
                        <div class="col-sm-7">
                        <i class="help-block"></i>
                        <i class="help-block2 text-danger"></i>
						<select  class="form-control" readonly >
							<option value="0">เลือก</option>
							</select>
                            <center><a class="btn btn-default float-center btn-block disabled" onclick="search_employee()">ค้นหา</a> </center>
                        </div>
                    </div>
            </div>
                <form class="form-horizontal" method="POST" id="edit_edit_user" name="edit_edit_user" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="edit_employee_id" id="edit_employee_id" >
				<input class="form-control" type="hidden" name="edit_username_old" id="edit_username_old" >
                    <div class="form-group  ">
						<label class="col-sm-3 control-label">ชื่อ :</label>
						<div class="col-sm-7">
							<input class="form-control" type="text" name="edit_employee_fname" id="edit_employee_fname" readonly>
						</div>
					</div>
                    <div class="form-group  ">
						<label class="col-sm-3 control-label">นามสกุล :</label>
						<div class="col-sm-7">
							<input class="form-control" type="text" name="edit_employee_lname" id="edit_employee_lname" readonly>
						</div>
					</div>
                    <div class="form-group  ">
						<label class="col-sm-3 control-label">เเผนก :</label>
						<div class="col-sm-7">
							<input class="form-control" type="text" name="edit_department" id="edit_department" readonly>
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
					<div class="form-group  ">
						<label class="col-sm-3 control-label">ประเภทผู้ใช้งาน :</label>
						<div class="col-sm-7">
							<select name="edit_type" id="edit_type" class="form-control" required>
								<option value="">เลือกประเภทผู้ใช้งาน</option>
								<option value="admin">ผู้ดูเเลระบบ</option>
								<option value="manager">ผู้จัดการ</option>
								<option value="emp_store">พนักงานคลังสินค้า</option>
								<option value="emp_produce">พนักงานผลิตสินค้า</option>
								<option value="emp_sale">พนักงานขายสินค้า</option>
								<option value="emp_account">พนักงานบัญชี</option>
							</select>
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

<script>

function search_employee() {
	var search_employee = $("#search_employee").val();
	if (search_employee == "" || search_employee == 0 ) {  //ค้นหาเป๋นค่าว่าง
		$("#search_employee").parent().parent().addClass('has-error');
		$('.help-block').text('เลือกหัสพนักงาน');
        $('.help-block1').text('');
        $('#insert_form_user')[0].reset(); 

		setTimeout(function () {
			$("#search_employee").parent().parent().removeClass('has-error');
			$('.help-block1').text('');
			$('.help-block').text('')
		}, 5000);
	} else {  //ค้นหาเป๋นค่าไม่ว่าง
		$("#search_employee").parent().parent().removeClass('has-error');
		$('.help-block').text('');
		$('.help-block1').text('');
		$.ajax({
			url: "User/search_employee",
			dataType: "JSON",
			method: "post",
			data: {
				search_employee: search_employee
			},
			success: function (data) {
				if (data.status) { //ถ้ามีข้อมุล พนักงาน
                    
                    if(data.check_user){ //ถ้าพนักงานไม่มีชื่อผู้ใช้
                        $("#employee_id").val(data.employee.employee_id);
                        $("#employee_fname").val(data.employee.employee_fname);
                        $("#employee_lname").val(data.employee.employee_lname);
                        $("#department").val(data.employee.name);
                    }else{ ///ถ้าพนักงานมีชื่อผู้ใช้อยู่เเล้ว
                        $('.help-block1').text('พนักงานคนนี้มีชื่อผู้ใช้เเล้ว');
                        $('#insert_form_user')[0].reset(); 
                        setTimeout(function () {
						$('.help-block1').text('')
					}, 5000);
                    }
				} else { //ถ้ามีข้อมุล พนักงาน
                    $('#insert_form_user')[0].reset(); 
					$("#search_employee").parent().parent().addClass('has-error');
					$('.help-block1').text('ไม่พบข้อมูล');
					setTimeout(function () {
						$("#search_employee").parent().parent().removeClass('has-error');
						$('.help-block1').text('');
						$('.help-block').text('')
					}, 5000);
				}
			}
		})
	}
}

</script>

<style>
.text-danger
{
    color:#DD4B39;
}
</style>