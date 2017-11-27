<script>

	$(document).ready(function () {

		$('#modal-insert-user').on('hidden.bs.modal', function () {
			location.reload();
		})

		$('#modal-edit-user').on('hidden.bs.modal', function () {
			location.reload();
        })

        $('#modal-edit-user-customer').on('hidden.bs.modal', function () {
			location.reload();
        })
        

       

		$("#insert_form_user").validate({

			rules: {
				employee_fname: "required",
				employee_lname: "required",
				department: "required",
				username: {
					required: true,
					minlength: 6,
					maxlength: 15,
				},
				type: "required",
				password: {
					required: true,
					minlength: 6,
					maxlength: 15,
				},
				confirmpassword: {
					equalTo: '[name="password"]',
					required: true,
					minlength: 6,
					maxlength: 15,
				},
			},
			messages: {
				username: {
					required: "กรุณากรอกข้อมูล",
					minlength: "กรุณากรอกอย่างน้อย 6 ตัวอักษร",
					maxlength: "กรุณากรอกไม่เกิน 15 ตัวอักษร"
				},
				type: "กรุณาเลือกข้อมูล",
				employee_fname: "ไม่มีข้อมูล",
				employee_lname: "ไม่มีข้อมูล",
				department: "ไม่มีข้อมูล",
				password: {
					required: "กรุณากรอกข้อมูล",
					minlength: "กรุณากรอกอย่างน้อย 6 ตัวอักษร",
					maxlength: "กรุณากรอกไม่เกิน 15 ตัวอักษร"
				},
				confirmpassword: {
					equalTo: "รหัสผ่านไม่ตรงกัน",
					required: "กรุณากรอกข้อมูล",
					minlength: "กรุณากรอกอย่างน้อย 6 ตัวอักษร",
					maxlength: "กรุณากรอกไม่เกิน 15 ตัวอักษร"
				},

			},
			errorElement: "em",
			errorPlacement: function (error, element) {
				// Add the `help-block` class to the error element
				error.addClass("help-block");

				// Add `has-feedback` class to the parent div.form-group
				// in order to add icons to inputs
				element.parents(".col-sm-7").addClass("has-feedback");

				element.parents(".col-sm-6").addClass("has-feedback");

				element.parents(".col-sm-3").addClass("has-feedback");

				element.parents(".col-sm-5").addClass("has-feedback");

				error.insertAfter(element);


				// Add the span element, if doesn't exists, and apply the icon classes to it.
				if (!element.next("span")[0]) {
					$("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
				}
			},
			success: function (label, element) {
				// Add the span element, if doesn't exists, and apply the icon classes to it.
				if (!$(element).next("span")[0]) {
					$("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
				}
			},
			highlight: function (element, errorClass, validClass) {
				$(element).parents(".col-sm-7").addClass("has-error").removeClass("has-success");
				$(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
				$(element).parents(".col-sm-6").addClass("has-error").removeClass("has-success");
				$(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
				$(element).parents(".col-sm-3").addClass("has-error").removeClass("has-success");
				$(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
				$(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
				$(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");

			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).parents(".col-sm-7").addClass("has-success").removeClass("has-error");
				$(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
				$(element).parents(".col-sm-6").addClass("has-success").removeClass("has-error");
				$(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
				$(element).parents(".col-sm-3").addClass("has-success").removeClass("has-error");
				$(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
				$(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
				$(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
			},


			submitHandler: function (form) {



				var formData = new FormData($('#insert_form_user')[0]);

				$.ajax({
					url: "User/insert_user",

					type: 'POST',

					dataType: "JSON",

					data: formData,

					async: false,

					cache: false,

					contentType: false,

					processData: false,

					success: function (data) {

						if (data.check_username) {
							// $('.help-block1').text('ok');
							// setTimeout(function () {
							//     $('.help-block1').text('')
							// }, 5000);
							$('#insert_form_user')[0].reset();
							location.reload();
						} else {
							$('.help-block1').text('ชื่อผู้ใช้งานซำกันกับในระบบ');
							setTimeout(function () {
								$('.help-block1').text('')
							}, 5000);
						}

					},
					error: function (textStatus, errorThrown) {


					}
				});

			}

		});

		//  edit user emp

		$("#edit_edit_user").validate({

			rules: {
				edit_username: {
					required: true,
					minlength: 6,
					maxlength: 15,
				},
				type: "required",
				edit_password: {
					required: true,
					minlength: 6,
					maxlength: 15,
				},
				edit_confirmpassword: {
					equalTo: '[name="edit_password"]',
					required: true,
					minlength: 6,
					maxlength: 15,
				},
			},
			messages: {
				edit_username: {
					required: "กรุณากรอกข้อมูล",
					minlength: "กรุณากรอกอย่างน้อย 6 ตัวอักษร",
					maxlength: "กรุณากรอกไม่เกิน 15 ตัวอักษร"
				},
				edit_type: "กรุณาเลือกข้อมูล",
				edit_password: {
					required: "กรุณากรอกข้อมูล",
					minlength: "กรุณากรอกอย่างน้อย 6 ตัวอักษร",
					maxlength: "กรุณากรอกไม่เกิน 15 ตัวอักษร"
				},
				edit_confirmpassword: {
					equalTo: "รหัสผ่านไม่ตรงกัน",
					required: "กรุณากรอกข้อมูล",
					minlength: "กรุณากรอกอย่างน้อย 6 ตัวอักษร",
					maxlength: "กรุณากรอกไม่เกิน 15 ตัวอักษร"
				},

			},
			errorElement: "em",
			errorPlacement: function (error, element) {
				// Add the `help-block` class to the error element
				error.addClass("help-block");

				// Add `has-feedback` class to the parent div.form-group
				// in order to add icons to inputs
				element.parents(".col-sm-7").addClass("has-feedback");

				element.parents(".col-sm-6").addClass("has-feedback");

				element.parents(".col-sm-3").addClass("has-feedback");

				element.parents(".col-sm-5").addClass("has-feedback");

				error.insertAfter(element);


				// Add the span element, if doesn't exists, and apply the icon classes to it.
				if (!element.next("span")[0]) {
					$("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
				}
			},
			success: function (label, element) {
				// Add the span element, if doesn't exists, and apply the icon classes to it.
				if (!$(element).next("span")[0]) {
					$("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
				}
			},
			highlight: function (element, errorClass, validClass) {
				$(element).parents(".col-sm-7").addClass("has-error").removeClass("has-success");
				$(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
				$(element).parents(".col-sm-6").addClass("has-error").removeClass("has-success");
				$(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
				$(element).parents(".col-sm-3").addClass("has-error").removeClass("has-success");
				$(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
				$(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
				$(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");

			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).parents(".col-sm-7").addClass("has-success").removeClass("has-error");
				$(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
				$(element).parents(".col-sm-6").addClass("has-success").removeClass("has-error");
				$(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
				$(element).parents(".col-sm-3").addClass("has-success").removeClass("has-error");
				$(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
				$(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
				$(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
			},


			submitHandler: function (form) {

				var formData = new FormData($('#edit_edit_user')[0]);

				$.ajax({
					url: "User/update_emp_user",

					type: 'POST',

					dataType: "JSON",

					data: formData,

					async: false,

					cache: false,

					contentType: false,

					processData: false,

					success: function (data) {

						if (data.check_username) {
							
							$('#insert_form_user')[0].reset(); 
							location.reload(); 
						} else {
							$('.help-block2').text('ชื่อผู้ใช้งานซำกันกับในระบบ');
							setTimeout(function () {
							    $('.help-block2').text('')
							}, 5000);
						}

					},
					error: function (textStatus, errorThrown) {


					}
				});

			}

		});


		// edit user

		$(".edit_data_user").click(function () {
			var id = $(this).attr("id");
			$.ajax({
				url: "User/select_emp_user",
				dataType: "JSON",
				method: "post",
				data: {
					id: id
				},
				success: function (data) {

					$("#edit_employee_id").val(data.user.employee_id);
					$("#edit_employee_fname").val(data.user.employee_fname);
					$("#edit_employee_lname").val(data.user.employee_lname);
					$("#edit_department").val(data.user.name);
                    $("#edit_username").val(data.user.username);
                    $("#edit_username_old").val(data.user.username);
					$("#edit_password").val(data.user.password);
					$("#edit_confirmpassword").val(data.user.password);
					$("#edit_type").val(data.user.user_type);

					$('#modal-edit-user').modal('show');
				}
			})
		});
		$(".delete_dataa").click(function () {

			var id = $(this).attr("id");

			$("#submit_delete").click(function () {
				$.ajax({
					url: "User/delete_user",
					method: "post",
					data: {
						id: id
					},
					success: function (data) {

						location.reload();

					}

				})
			})

		});

		$('#datatable-users').DataTable({

			"lengthMenu": [
				[10, 15, 20, -1],
				[10, 15, 20, "All"]
			],
			"language": {
				"lengthMenu": "เเสดง _MENU_ หน้า",
				"zeroRecords": "<p style='color:red;'> - - - ไม่มีรายการ - - - </p>",
				"search": "ค้าหา",
				"info": " หน้า _PAGE_ จาก _PAGES_",
				"infoEmpty": " ",
				"infoFiltered": "(filtered from _MAX_ total records)",
			}

        });

        //--------------------------user_customer-------------------------------------------------- //


        $(".edit_data_user_customer").click(function () {
			var id = $(this).attr("id");
			$.ajax({
				url: "user_customer/select_customer_user",
				dataType: "JSON",
				method: "post",
				data: {
					id: id
				},
				success: function (data) {

					$("#edit_customer_id").val(data.user_customer.customer_id);
					$("#edit_customer_fname").val(data.user_customer.customer_fname);
					$("#edit_customer_lname").val(data.user_customer.customer_lname);
                    $("#edit_username").val(data.user_customer.username);
                    $("#edit_username_old").val(data.user_customer.username);
					$("#edit_password").val(data.user_customer.password);
					$("#edit_confirmpassword").val(data.user_customer.password);	

					 $('#modal-edit-user-customer').modal('show');
				}
			})
		});

        	//  edit user emp

		$("#edit_edit_user_customer").validate({
            
                        rules: {
                            edit_username: {
                                required: true,
                                minlength: 6,
                                maxlength: 15,
                            },
                            edit_password: {
                                required: true,
                                minlength: 6,
                                maxlength: 15,
                            },
                            edit_confirmpassword: {
                                equalTo: '[name="edit_password"]',
                                required: true,
                                minlength: 6,
                                maxlength: 15,
                            },
                        },
                        messages: {
                            edit_username: {
                                required: "กรุณากรอกข้อมูล",
                                minlength: "กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                                maxlength: "กรุณากรอกไม่เกิน 15 ตัวอักษร"
                            },
                            edit_password: {
                                required: "กรุณากรอกข้อมูล",
                                minlength: "กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                                maxlength: "กรุณากรอกไม่เกิน 15 ตัวอักษร"
                            },
                            edit_confirmpassword: {
                                equalTo: "รหัสผ่านไม่ตรงกัน",
                                required: "กรุณากรอกข้อมูล",
                                minlength: "กรุณากรอกอย่างน้อย 6 ตัวอักษร",
                                maxlength: "กรุณากรอกไม่เกิน 15 ตัวอักษร"
                            },
            
                        },
                        errorElement: "em",
                        errorPlacement: function (error, element) {
                            // Add the `help-block` class to the error element
                            error.addClass("help-block");
            
                            // Add `has-feedback` class to the parent div.form-group
                            // in order to add icons to inputs
                            element.parents(".col-sm-7").addClass("has-feedback");
            
                            element.parents(".col-sm-6").addClass("has-feedback");
            
                            element.parents(".col-sm-3").addClass("has-feedback");
            
                            element.parents(".col-sm-5").addClass("has-feedback");
            
                            error.insertAfter(element);
            
            
                            // Add the span element, if doesn't exists, and apply the icon classes to it.
                            if (!element.next("span")[0]) {
                                $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                            }
                        },
                        success: function (label, element) {
                            // Add the span element, if doesn't exists, and apply the icon classes to it.
                            if (!$(element).next("span")[0]) {
                                $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                            }
                        },
                        highlight: function (element, errorClass, validClass) {
                            $(element).parents(".col-sm-7").addClass("has-error").removeClass("has-success");
                            $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                            $(element).parents(".col-sm-6").addClass("has-error").removeClass("has-success");
                            $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                            $(element).parents(".col-sm-3").addClass("has-error").removeClass("has-success");
                            $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                            $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
            
                        },
                        unhighlight: function (element, errorClass, validClass) {
                            $(element).parents(".col-sm-7").addClass("has-success").removeClass("has-error");
                            $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                            $(element).parents(".col-sm-6").addClass("has-success").removeClass("has-error");
                            $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                            $(element).parents(".col-sm-3").addClass("has-success").removeClass("has-error");
                            $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                            $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                        },
            
            
                        submitHandler: function (form) {
            
                            var formData = new FormData($('#edit_edit_user_customer')[0]);
            
                            $.ajax({
                                url: "user_customer/update_customer_user",
            
                                type: 'POST',
            
                                dataType: "JSON",
            
                                data: formData,
            
                                async: false,
            
                                cache: false,
            
                                contentType: false,
            
                                processData: false,
            
                                success: function (data) {
            
                                   
                                    if (data.check_username) {
                                        
                                        $('#edit_edit_user_customer')[0].reset(); 
                                        location.reload(); 
                                    } else {
                                        $('.help-block3').text('ชื่อผู้ใช้งานซำกันกับในระบบ');
                                        setTimeout(function () {
                                            $('.help-block3').text('')
                                        }, 5000);
                                        
                                    }
            
                                },
                                error: function (textStatus, errorThrown) {
            
            
                                }
                            });
            
                        }
            
                    });

                	$(".delete_data_customer").click(function () {
                        
                                    var id = $(this).attr("id");
                        
                                    $("#submit_delete").click(function () {
                                        $.ajax({
                                            url: "user_customer/delete_user",
                                            method: "post",
                                            data: {
                                                id: id
                                            },
                                            success: function (data) {
                        
                                                location.reload();
                        
                                            }
                        
                                        })
                                    })
                        
                                });





        
        $('#datatable-users-customer').DataTable({
            
                        "lengthMenu": [
                            [10, 15, 20, -1],
                            [10, 15, 20, "All"]
                        ],
                        "language": {
                            "lengthMenu": "เเสดง _MENU_ หน้า",
                            "zeroRecords": "<p style='color:red;'> - - - ไม่มีรายการ - - - </p>",
                            "search": "ค้าหา",
                            "info": " หน้า _PAGE_ จาก _PAGES_",
                            "infoEmpty": " ",
                            "infoFiltered": "(filtered from _MAX_ total records)",
                        }
            
                    });

	});

</script>
