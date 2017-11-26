

<script>

     $(document).ready(function(){
// js insert_amount---------------------------------------------------------------------------------------------

             $(".update_status_stock").click(function(){
                    
                    var id=$(this).attr("id");

                  $.ajax({
                                    url:"produce_product/update_status",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                      
                                         location.reload();

                                        }

                                    })
                                                              
              });


               $(".update_status_stock1").click(function(){
                    
                    var id=$(this).attr("id");

                  $.ajax({
                                    url:"produce_product_sent/update_status1",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                      
                                      location.reload();
                                         

                                        }

                                    })
                                                              
              });


             $("#select-date").submit(function(event) {
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
                          

        window.open('Genpdf/amount?id='+id+'&date_start='+date_start+'&date_end='+date_end+'', '_blank')
                                                                                                    
                    }
                }

               });


            $("#select-date_order").submit(function(event) {
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
                          

        window.open('Genpdf/show_order_all_1?id='+id+'&date_start='+date_start+'&date_end='+date_end+'', '_blank')
                                                                                                    
                    }
                }

               });




           $('#datatable-produce_product').DataTable({

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