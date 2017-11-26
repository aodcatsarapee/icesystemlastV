<script>

     $(document).ready(function(){


      $(".show_debtor").click(function(event) {
        /* Act on the event */


                 var id=$(this).attr("id");
                  
                   $.ajax({
                    
                      url:"Debtor/show_debtor_detail",
                      
                      method:"post",
                      
                      data:{id:id},

                    success:function(data){

                       $("#debtor_detail").html(data);

                       $("#modal-show-debtor_detail").modal('show');   
                                       
                    }

                    })
              
      });



        $("#select-date_debtor").submit(function(event) {
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
                          

        window.open('Genpdf/debtor_all_1?id='+id+'&date_start='+date_start+'&date_end='+date_end+'', '_blank')
                                                                                                    
                    }
                }

               });




















// js veiw_data---------------------------------------------------------------------------------------------

                $('#datatable-debtor').DataTable({

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