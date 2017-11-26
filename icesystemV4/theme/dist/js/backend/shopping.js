<script>     
$(document).ready(function(){
 //ขายสินค้าเป็นเงินสด-----------------------------------------------------------------------------
    $('#form_total_success').submit(function(event) {
           event.preventDefault();


           var total = parseInt($("#total").val());
           var received =parseInt($("#received").val());

                if($("#total").val() == '0'){

                        $('#alert_select').modal('show');

                }else if($("#received").val() == 0){

                        $('#alert_received').modal('show');                            

                }else if(received < total){

                           $('#alert_change').modal('show');
                    
                }else{
                     
                          $.ajax({
                                       
                            url:"shopping/save_order",
                                       
                            method:"post",
                                       
                            data:$('#form_total_success').serialize(), 

             
                            success:function(data){

                            window.open('Genpdf/print_sell', '_blank')

                             window.location = "<?php echo base_url(); ?>index.php/shopping/remove/all";

                             }
                           
                        });
                }  
    });
    // ขายสินค้าเป็นเงินเชื่อ-----------------------------------------------------------------------------
      $('#form_total_success1').submit(function(event) {
           event.preventDefault();

                  var total = $("#total").val();

                  var name = $("#select_customer").val();

                if($("#total").val() == '0'){

                        $('#alert_select').modal('show');

                }else if($("#select_customer").val().length == 0){

                       $('#alert_select_customer').modal('show');
                  
                }else{
                      $.ajax({
                                       
                            url:"shopping/save_order_for_debtor",
                                       
                            method:"post",
                                       
                            data:$('#form_total_success1').serialize(),

             
                            success:function(data){

                            window.open('Genpdf/print_sell_debtor_1?name='+name ,'_blank')

                             window.location = "<?php echo base_url(); ?>index.php/shopping/remove/all";
                             }
                           
                        });
                }
    })



  $("#test").validate({
              rules: {
                     received:{
                          required: true, 
                          number: true,
                      },                     
                      },
                    messages: {
                    received: {
                        required: "กรุณากรอกจำนวนเงิน",
                        number:"กรุณากรอกเป็นตัวเลข",
                    },                    
                    },
                    errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents( ".col-sm-12" ).addClass( "has-feedback" );

                     

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
                    $( element ).parents( ".col-sm-12" ).addClass( "has-error" ).removeClass( "has-success" );
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                    
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-12" ).addClass( "has-success" ).removeClass( "has-error" );
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    
                },


            submitHandler: function(form) {

            aler("555");

                             
  }
 });



//---------------เเสดงรายละเอียดการขาย---------------------------------------------------------

$(".show_order_sell").click(function(event) {
   
 var id=$(this).attr("id");
           
                $.ajax({
                             url:"Shopping_show_sell_detail/select_order_for_show_sell",
                            method:"post",
                            data:{id:id},
                             success:function(data){

                                $("#sell_detail").html(data);

                                $("#modal-show-sell_detail").modal('show');                             
                             
                             }

                          })            


});



    $('#submit_cancel').click(function(event) {
        /* Act on the event */
        window.location = "<?php echo base_url(); ?>index.php/shopping/remove/all";
    });


     $('#datatable-orders').DataTable({
                "order": [[ 0, "desc" ]],

               "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
                "language": {
                    "lengthMenu": "เเสดง _MENU_ หน้า",
                   "zeroRecords": "<p style='color:red;'> - - - ไม่มีรายการ - - - </p>",
                    "search": "ค้าหา :",
                    "info": " หน้า _PAGE_ จาก _PAGES_",
                  "infoEmpty": " ",
                   "infoFiltered": "(filtered from _MAX_ total records)"
        }

     });


       });

 </script> 