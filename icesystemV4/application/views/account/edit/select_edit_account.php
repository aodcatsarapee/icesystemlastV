<script type="text/javascript">
  $(document).ready(function(){
 // js insert data---------------------------------------------------------------------------------------------
             $("#update_account").validate({
              rules: {
                      //account_type: "required",
                      account_detail:"required",
                     money:{
                          required: true, 
                          number: true,
                      }, 
                      },
                    messages: {
                   // account_type: "กรุณากรอกข้อมูล",
                   account_detail:"กรุณากรอกข้อมูล",
                    money: {
                        required: "กรุณากรอกข้อมูล",
                        number:"กรุณากรอกเป็นตัวเลข",
                    },
   
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

              var formData = new FormData($('#update_account')[0]);


                              $.ajax({
                                   
                                    url:"Account/update_account",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                   
                                    $('#update_account')[0].reset(); 
                                   
                                    $('#modal-insert-account').modal('hide');            
                                    
                                    location.reload();
                                    
                                    }
                              });

                        }
                    });
             });
</script>
<form class="form-horizontal" method="POST" id="update_account" name="update_account" enctype="multipart/form-data" >
           
          <div class="form-group ">
              <label class="col-sm-3 control-label"  >ประเภท :</label>
                <div class="col-sm-7">
                <fieldset disabled>
              <input type="text"  class="form-control" value="<?php echo $accunt['account_type']; ?>"  >
              </fieldset>
              <input type="hidden" name="account_id" id="account_id" class="form-control" value="<?php echo $accunt['account_id'] ?>">

              <input type="hidden" name="account_type" id="account_type" class="form-control" value="<?php echo $accunt['account_type']; ?>">
              </div>
            </div>

          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >จำนวนเงิน :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="money" id="money"  placeholder="เช่น  100 200 300  "  value="<?php 

                                if($accunt['account_type']=='รายรับ'){

                                    echo $accunt['account_income'];
                                }else{

                                    echo $accunt['account_expenses'];
                                }

               ?>">
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >รายละเอียด : </label>
            <div class="col-sm-7">
              <textarea name="account_detail" id="account_detail" class="form-control" rows="4" required="required"><?php echo $accunt['account_detail']; ?> </textarea>
            </div>
          </div>
           <input type="submit" class="btn btn-default"  value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
        </form>
        <br>
        <br>