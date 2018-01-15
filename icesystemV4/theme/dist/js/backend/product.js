
<script>

     $(document).ready(function(){
 // js insert data---------------------------------------------------------------------------------------------

             $("#insert_form").validate({
              rules: {
                      name: "required",
                      detail:"required",
                     price:{
                          required: true, 
                          number: true,
                      },
                      product_img:"required",
                      type:"required",
                      amount_alert:{
                          required: true, 
                          number: true,
                      },
                      },
                    messages: {
                    name: "กรุณากรอกข้อมูล",
                    detail:"กรุณากรอกข้อมูล",
                    price: {
                        required: "กรุณากรอกข้อมูล",
                        number:"กรุณากรอกเป็นตัวเลข",
                    },
                    product_img:"กรุณากรอกข้อมูล",
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

              var formData = new FormData($('#insert_form')[0]);

                             $.ajax({
                                   
                                    url:"product/insert_data",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                   
                                    $('#insert_form')[0].reset(); 
                                   
                                   // $('#modal-insert').modal('hide');            
                                    
                                    location.reload();
                                    
                                    }
                              });

  }
 });

 // js veiw_data---------------------------------------------------------------------------------------------

                         $(".edit_data").click(function(){
                            var id=$(this).attr("id");
                                      $.ajax({
                                    url:"product/select_data",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                    $("#detail").html(data);
                                    $("#modal-edit").modal('show');   
                                       
                                        }

                                    })
         
                                           
                                });
// js update_amount---------------------------------------------------------------------------------------------
                 $(".update_amount").click(function(){
                           
                            var id=$(this).attr("id");
                                      $.ajax({
                                    url:"product/select_data_for_amount",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                    $("#detail_amount").html(data);
                                    $("#modal_update_amount").modal('show');   
                                       
                                        }

                                    })
         
                                           
                                });

// js delete_data---------------------------------------------------------------------------------------------
                
                 $(".delete_data").click(function(){
                    
                    var id=$(this).attr("id");
                      
                           $("#submit_delete").click(function(){

                                      $.ajax({
                                    url:"product/delete_data",

                                    method:"post",
                                    data:{id:id},

                                    success:function(data){
                                        
                                        location.reload();
                                         
                                        }

                                    })
                            
                            
                                           
                                });
         
                                           
                                });
// js delete_data---------------------------------------------------------------------------------------------
                 $(".product_detail").click(function(){
                        
                         var id =$(this).attr("id");
                           
                                      $.ajax({
                                    url:"product/select_data_for_product_detail",
                                    method:"post",
                                    
                                    success:function(data){
                                      $("#pd_detail").html(data);
                                      $("#modal-product-detail").modal('show');   
                                       
                                        }

                                    }) 
                                           
                                });

              
//-------------------------------------------------------------------------------------------------------------
           $('#datatable-product').DataTable({

               "lengthMenu": [[5, 15, 20, -1], [5, 15, 20, "All"]],
                "language": {
                    "lengthMenu": "เเสดง _MENU_ หน้า",
                   "zeroRecords": "<p style='color:red;'> - - - ไม่มีรายการ - - - </p>",
                    "search": "ค้าหา",
                    "info": " หน้า _PAGE_ จาก _PAGES_",
                   "infoEmpty": " ",
                   "infoFiltered": "(filtered from _MAX_ total records)",
        }
             
           });


               $('#datatable-product-order').DataTable({

                "order": [[ 0, "desc" ]],
               "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
               "language": {
                    "lengthMenu": "เเสดง _MENU_ หน้า",
                   "zeroRecords": "<p style='color:red;'> - - - ไม่มีรายการ - - - </p>",
                    "search": "ค้าหา",
                    "info": " หน้า _PAGE_ จาก _PAGES_",
                   "infoEmpty": " ",
                   "infoFiltered": "(filtered from _MAX_ total records)",
        }
             
           });


           
           $('#contact').DataTable({

            "order": [[ 0, "asc" ]],
           "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
           "language": {
                "lengthMenu": "เเสดง _MENU_ หน้า",
               "zeroRecords": "<p style='color:red;'> - - - ไม่มีรายการ - - - </p>",
                "search": "ค้าหา",
                "info": " หน้า _PAGE_ จาก _PAGES_",
               "infoEmpty": " ",
               "infoFiltered": "(filtered from _MAX_ total records)",
    }
         
       })




           
//----------controll datatable---------------------------------------------------------------------------------------------------
           });  //end.ready 

     </script>

