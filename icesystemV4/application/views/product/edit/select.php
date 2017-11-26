<script type="text/javascript">
  $(document).ready(function(){
 // js insert data---------------------------------------------------------------------------------------------
           $("#edit_form").validate({
            rules: {
                    name: "required",
                    detail:"required",
                   price:{
                        required: true, 
                        number: true,
                    },
                    type:"required",
                      amount_alert:{
                          required: true, 
                          number: true,
                      },
                 
                    },
                    
                     price:{
                        required: true, 
                        number: true,
                    },
                    messages: {
                    name: "กรุณากรอกข้อมูล",
                    detail:"กรุณากรอกข้อมูล",
                    price: {
                        required: "กรุณากรอกข้อมูล",
                        number:"กรุณากรอกเป็นตัวเลข",
                    },
                    type:"กรุณากรอกข้อมูล",
                      amount_alert:{
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

               var formData = new FormData($('#edit_form')[0]);

                              $.ajax({
                                   
                                    url:"product/update_data",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                   
                                    $('#edit_form')[0].reset(); 
                                   
                                    $('#modal-edit').modal('hide');            
                                    
                                    location.reload();
                                    
                                    }
                              });
                          }
                    });
             });
</script>
        
  <form class="form-horizontal" method="POST" id="edit_form" >
           <div class="form-group form-group-lg">
            <label class="col-sm-3 control-label" >รหัสสินค้า :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text"  class="form-control" value="<?php echo $rs['product_id']; ?>"  >
              </fieldset>

              <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $rs['product_id']; ?>">
               <input type="hidden" name="product_img_old" id="product_img_old" class="form-control" value="<?php echo $rs['product_img']; ?>">
            </div>
          </div>
          <div class="form-group  ">
            <label class="col-sm-3 control-label"  >ชื่อสินค้า :</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="name" id="name" value="<?php echo $rs['product_name']; ?>">
            </div>
          </div>
          <div class="form-group ">
            <label class="col-sm-3 control-label" >รายละเอียด :</label>
            <div class="col-sm-7">
              <textarea name="detail" id="detail" class="form-control" rows="3" maxlength="100" ><?php echo $rs['product_detail']; ?></textarea>
            </div>
          </div>
           <div class="form-group ">
            <label class="col-sm-3 control-label" >ราคา :</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="price" id="price" value="<?php echo $rs['product_price']; ?>">
            </div>
          </div>
           <div class="form-group ">
            <label class="col-sm-3 control-label" >หน่วย :</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="type" id="type" placeholder="เช่น ก้อน ถุง กระสอบ" value="<?php echo $rs['product_type']; ?>"  >
            </div>
          </div>
          <div class="form-group ">
            <label class="col-sm-3 control-label" >เเจ้งเมื่อสินค้าใกล้หมด :</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="amount_alert" id="amount_alert" placeholder="จำนวน เช่น  5 10 15"  value="<?php echo $rs['product_alert']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" >รูปภาพ :</label>
            <div class="col-sm-6">
             <input type="file"  name="product_img" class="form-control" id="product_img" accept="image/*" >

            </div>
          </div>
           
      </div>
        <input type="submit" class="btn btn-default" id="edit" value=" บันทึกข้อมูล " style="float: right;font-size: 15px;">
        </form>
        <br>
        <br>


