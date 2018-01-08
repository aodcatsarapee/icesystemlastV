<script>

     $(document).ready(function(){

         
// js insert data---------------------------------------------------------------------------------------------

             $("#edit_form_Department").validate({
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

               var formData = new FormData($('#edit_form_Department')[0]);

                             $.ajax({
                                   
                                    url:"department/edit_data_depatment",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                  
                                    $('#edit_form_Department')[0].reset(); 
                                   
                                    $('#modal-edit-department').modal('hide');            
                                    
                                    location.reload();
                                    
                                    }
                              });

         }
 });

             });

</script>


<form class="form-horizontal" method="POST" id="edit_form_Department" name="edit_form_Department" enctype="multipart/form-data" >
           <div class="form-group ">
            <label class="col-sm-3 control-label" >รหัสแผนกงาน :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $rs['department_id'] ?>" >
              </fieldset>
            </div> 
          </div>
          <input type="hidden" id="department_id" name='department_id' class="form-control" value="<?php echo $rs['department_id'] ?>" >
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ชื่อแผนกงาน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="department_name" id="department_name"  placeholder="เช่น พนักงานผลิต " value="<?php echo $rs['name'] ?>" >
            </div>
          </div>

          <div class="form-group  ">
            <label class="col-sm-4 control-label"  >อัตราเงินเดือนรายวัน :</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="salaly_set" id="salaly_set"  placeholder="เช่น 300 " value="<?php echo $rs['salaly_set'] ?>" >
            </div>
          </div>
        
           <input type="submit" class="btn btn-default" value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
        </form>
        <br><br>