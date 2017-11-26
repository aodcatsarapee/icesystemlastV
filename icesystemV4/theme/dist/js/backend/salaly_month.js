<script> 
		  $(document).ready(function(){

		  		$(".inset_salaly").click(function(){
            		
             			 var id = $(this).attr("id");
                 
             			 	
                                      $.ajax({
                                    url:"Salaly_month/select_data_salaly",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                    $("#salaly_detail").html(data);
                                    $("#modal-salaly-month").modal('show');  

                                       
                                        }

                                    })

                                      	});



          $(".avg_absence").click(function(){
                
                   var id = $(this).attr("id");
                 
                    
                                      $.ajax({
                                    url:"Salaly_month/select_data_ab",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                    $("#absence_detail").html(data);
                                    $("#modal-absence-month").modal('show');  

                                       
                                        }

                                    })

                                        });

           $('#month_money').DataTable({

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


             $('#month_money2').DataTable({

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