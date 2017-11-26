<script>

     $(document).ready(function(){

     		 

// js insert data---------------------------------------------------------------------------------------------

             $("#insert_form_Department").validate({
              rules: {
                      department_name: "required",
                     
                      },
                    messages: {
                    department_name: "กรุณากรอกข้อมูล",                         
                    },
                    errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents( ".col-sm-7" ).addClass( "has-feedback" );

                     element.parents( ".col-sm-6" ).addClass( "has-feedback" );

                    error.insertAfter( element );
                    

                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if ( !element.next( "span" )[ 0 ] ) {
                        $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
                    }
                },
                success: function ( label, element ) {
                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if ( !$( element ).next( "span" )[ 0 ] ) {
                        $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-7" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                    $( element ).parents( ".col-sm-6" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-7" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    $( element ).parents( ".col-sm-6" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                },


            submitHandler: function(form) {

              var formData = new FormData($('#insert_form_Department')[0]);

                             $.ajax({
                                   
                                    url:"department/insert_data_depatment",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                 
                                    $('#insert_form_Department')[0].reset(); 
                                   
                                    $('#modal-edit-department').modal('hide');            
                                    
                                    location.reload();
                                    
                                    }
                              });

  }
 });

             	$(".edit_data_department").click(function(){
            		
             			 var id = $(this).attr("id");
                 

                                      $.ajax({
                                    url:"department/select_data_department",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                    $("#de_detail").html(data);
                                    $("#modal-edit-department").modal('show');   
                                       
                                        }

                                    })


             	});
  $(".delete_data_department").click(function(){
                
                   var id = $(this).attr("id");
                 
                  $("#submit_delete").click(function(){
                                      $.ajax({
                                    url:"department/delete_depaetment",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                       location.reload();
                                       
                                        }

                                    })
                              })

              });











                  $('#datatable-depaartment').DataTable({

               "lengthMenu": [[5, 15, 20, -1], [5, 15, 20, "All"]],
                "language": {
                    "lengthMenu": "เเสดง _MENU_ หน้า",
                   "zeroRecords": "<p style='color:red;'> - - - ไม่มีรายการ - - - </p>",
                    "search": "ค้าหา",
                    "info": " หน้า _PAGE_ จาก _PAGES_",
                  "infoEmpty": " ",
                   "infoFiltered": "(filtered from _MAX_ total records)"
        }
             
           });





     });

</script>