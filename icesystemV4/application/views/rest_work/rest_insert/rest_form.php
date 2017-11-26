<script>

     $(document).ready(function(){

         
// js insert data---------------------------------------------------------------------------------------------

             $("#rest_emp").validate({
              rules: {
                        rest_before: "required",
                        rest_after:"required",
                      },
                    messages: {
                         rest_before: "กรุณากรอกวันที่" , 
                        rest_after: "กรุณากรอกข้อมูล" ,

                    },
                    errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents( ".col-sm-7" ).addClass( "has-feedback" );

                     element.parents( ".col-sm-6" ).addClass( "has-feedback" );

                      element.parents( ".col-sm-3" ).addClass( "has-feedback" );

                      element.parents( ".col-sm-5" ).addClass( "has-feedback" );

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
                     $( element ).parents( ".col-sm-3" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                     $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );

                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-7" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    $( element ).parents( ".col-sm-6" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    $( element ).parents( ".col-sm-3" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                     $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                },


            submitHandler: function(form) {

               var formData = new FormData($('#rest_emp')[0]);

                             $.ajax({
                                   
                                    url:"Rest_work/insert_rest",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                     
                                  
                                    $('#rest_emp')[0].reset(); 
                                   
                                    $('#modal-rest-work').modal('hide');            
                                    
                                    location.reload();
                                    
                                    }
                              });

         }
 });

             });

</script>

  <form class="form-horizontal" method="POST" id="rest_emp" name="rest_emp" enctype="multipart/form-data" >
           <div class="form-group ">
            <label class="col-sm-3 control-label" >รหัสพนักงาน :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $rs['employee_id'] ?>" >
              </fieldset>
            </div>
          </div>

           <input type="hidden" name="employee_id" class="form-control" value="<?php echo $rs['employee_id']; ?>">

          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >หยุดตั้งแต่วันที่ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="date" name="rest_before" id="rest_before"   >
            </div>
          </div>


          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >จนถึงวันที่ :</label>
            <div class="col-sm-7">
              <input class="form-control" type="date" name="rest_after" id="rest_after"   >
            </div>
          </div>      



 			





           <input type="submit" class="btn btn-default" id="insert" value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
        </form>
        <br><br>