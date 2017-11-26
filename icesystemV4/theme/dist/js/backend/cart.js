<script>

$(document).ready(function(){

// cart----------------------------------------------------------------------------

	$(".show_order_detail_customer").click(function(event) {
	  /* Act on the event */

	  var id=$(this).attr("id");
	  
	   $.ajax({
                      url:"show_order_detail_customer",
                       method:"post",
                        data:{id:id},
                        success:function(data){
                        $("#order_detail_customer_1").html(data);
                        $("#modal-show-order_detail_customer").modal('show');

                                        }

                                    })
	});
 });

 $(".delete_data_order").click(function(){
                    
                    var id=$(this).attr("id");
                      
                           $("#submit_delete").click(function(){

                                      $.ajax({
                                    url:"delete_data",

                                    method:"post",
                                    data:{id:id},

                                    success:function(data){
                                        
                                        location.reload();
                                         
                                        }

                                    })
                            
                            
                                           
                                });
         
                                           
                                });


$(".edit_customer1").click(function(){
                            var id=$(this).attr("id");

                           
                                      $.ajax({
                                    url:"select_customer",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                    $("#cus_detail").html(data);
                                    $("#modal-edit-customer").modal('show');   
                                       
                                        }

                                    })
         
                                           
                                });

 $('#datatable-order-customer').DataTable({

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
</script>