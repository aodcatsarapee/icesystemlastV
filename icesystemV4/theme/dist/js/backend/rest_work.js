<script> 
		  $(document).ready(function(){



          $("#restWork").submit(function(event) {
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

        window.open('Rest_work/print_rest?id='+id+'&date_start='+date_start+'&date_end='+date_end+'', '_blank')
                                                                                                    
                    }
                }


               });




		  		$(".insert_rest").click(function(){
            		
             			 var id = $(this).attr("id");
                 
             			 	
                                      $.ajax({
                                    url:"Rest_work/select_data_rest",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                    $("#rest_detail").html(data);
                                    $("#modal-rest-work").modal('show');  

                                       
                                        }

                                    })

                                          });
                                          
                 $(".delete_rest" ).click(function(){                 
                         var id = $(this).attr("id");

                        
                                          
                         $("#submit_delete").click(function(){   
                         $.ajax({
                         url:"Rest_work/delete_rest",    //ชื่อฟังชั่น
                         method:"post",
                         data:{id:id},
                         success:function(data){
                         location.reload();
                        
                                                                
                                                                 }
                         
                                                             })
                                                       })
                         
                                       });                            




             $('#rest_work').DataTable({

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



             $('#rest_work2').DataTable({

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





               });



</script>