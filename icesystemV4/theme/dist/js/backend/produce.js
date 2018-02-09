<script>

     $(document).ready(function(){

// js insert_amount---------------------------------------------------------------------------------------------

                $(".insert_amount").click(function(){
                    
                          var id=$(this).attr("id");
          
                  
                                      $.ajax({
                                    url:"produce/insert_amount",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                       
                                        location.reload();
                                           
                                            
                                        }

                                    })                                  
                                                              
                                });


// js deoete_insert_amount---------------------------------------------------------------------------------------------

                 $(".detete_amount").click(function(){
                    
                  
                          var id=$(this).attr("id");
          
                  $("#delete_insert_amount").click(function(){

                    
                                      $.ajax({
                                    url:"produce/delete_amount",
                                    method:"post",
                                    data:{id:id},
                                    success:function(data){
                                       
                                         location.reload();

                                        }

                                    })

                                   });
                                                              
                                });


 // js insert data---------------------------------------------------------------------------------------------


$('#insert_form1').submit(function(event){
event.preventDefault();


  for(var i = 0; i< $("#number").val();i++){
      
      var data = "#product_amount"+i;

      if($(data).val() == ""){
        
        $(".error").text("---------------กรอกจำนวนให้ครบ-----------------").css({"color":"red"})
         return false;
      }

}


   var formData = new FormData($('#insert_form1')[0]);

                             $.ajax({
                                   
                                    url:"produce/insert_data",
                                   
                                    type: 'POST',
                                   
                                    data: formData,

                                    async: false,

                                    cache: false,

                                    contentType: false,

                                    processData: false,
                                   
                                    success:function(data){
                                   
                                   
                                    
                                    location.reload();
                                    
                                    },
                                     error: function (textStatus, errorThrown) {
                                           alert("Error");
                                        
                                         
                                        }
                              });


});

// show_stock_detail
  $(".show_stock_detail").click(function(event) {
    
      var id=$(this).attr("id");
              
                $.ajax({
                    
                        url:"produce/select_data_stock_detail",
                        
                         method:"post",
                        
                         data:{id:id},
                        
                         success:function(data){
                        
                         $("#stock_detail").html(data);
                        
                        $("#modal_show_stock_detail").modal('show');   
                                           
                           }

                    })

      });


               $('#datatable-produce').DataTable({

              
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