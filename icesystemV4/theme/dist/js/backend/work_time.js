<script> 


		  $(document).ready(function(){


      $("#select-date_work_time").submit(function(event) {
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

        window.open('print_work_detail?id='+id+'&date_start='+date_start+'&date_end='+date_end+'', '_blank')
                                                                                                    
                    }
                }

               });
       $("#select-date_absence").submit(function(event) {
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

        window.open('Absence/print_absence?id='+id+'&date_start='+date_start+'&date_end='+date_end+'', '_blank')
                                                                                                    
                    }
                }


               });




                $('#table_worrk').DataTable({

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


                 $('#table_worrk2').DataTable({

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

                   $('#table_worrk3').DataTable({

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