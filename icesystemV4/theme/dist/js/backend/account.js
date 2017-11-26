<script>

     $(document).ready(function(){

     	 $("#insert_account").validate({
              rules: {
                      account_type: "required",
                      account_detail:"required",
                     money:{
                          required: true, 
                          number: true,
                      }, 
                      },
                    messages: {
                    account_type: "กรุณากรอกข้อมูล",
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

              var formData = new FormData($('#insert_account')[0]);


                              $.ajax({
                                   
                                    url:"Account/insert_account",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                   
                                    $('#insert_account')[0].reset(); 
                                   
                                    $('#modal-insert-account').modal('hide');            
                                    
                                    location.reload();
                                    
                                    }
                              });

  }
 });

				$(".edit-account").click(function(){
                            var id=$(this).attr("id");
                                     $.ajax({
                                    url:"Account/select_data",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                    $("#account-detail").html(data);
                                    $("#modal-edit-account").modal('show');   
                                       
                                        }

                                    })
         
                                           
                                });

          $(".delete-account").click(function(){
                          
                      var id=$(this).attr("id");  
                      
                      $("#submit_delete").click(function() {
                      
                                    $.ajax({
                                    url:"Account/delete_data",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){

                                    location.reload();  
                                       
                                        }

                                    })

                                  });
                   
                                });

        $("#select-date_account").submit(function(event) {
                   event.preventDefault();
    
                 
                 if($("#date_start").val()=="" || $("#date_end").val()==""){

                        $("#alert_select-date").modal('show');   


                }else{
                    if($("#date_start").val() > $("#date_end").val() ) {

                     $("#alert-error-date").modal('show'); 

                    }else{

                        
                          var id         = $("#id").val();
                          var date_start =$("#date_start").val();
                          var date_end   =$("#date_end").val()
                          
                          ;

        window.open('Genpdf/Account_all_1?id='+id+'&date_start='+date_start+'&date_end='+date_end+'', '_blank')
                                                                                                    
                    }
                }

               });


      $('#datatable-account').DataTable({

                 "order": [[ 0, "desc" ]],
               "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
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