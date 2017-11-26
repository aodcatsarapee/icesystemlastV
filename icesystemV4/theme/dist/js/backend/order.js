<script>

     $(document).ready(function(){

      $('.view_order').click(function(event) {
        /* Act on the event */

         var id=$(this).attr("id");

                 $.ajax({
                      url:"order/show",
                       method:"post",
                        data:{id:id},
                        success:function(data){
                        $("#order_detail").html(data);
                        $("#modal-show-order_detail").modal('show');

                                        }

                                    })

      });


  $('.check_out_order').click(function(event) {
           event.preventDefault();

          var id=$(this).attr("id");


              $.ajax({

                            url:"order/check_out_order",

                            method:"post",

                            data:{id:id},

                            success:function(data){


                              location.reload();


                             }

                        });
      
      });


$('.check_out_order_debtor').click(function(event) {
           event.preventDefault();

          var id=$(this).attr("id");


              $.ajax({

                            url:"order/check_out_order_debtor",

                            method:"post",

                            data:{id:id},

                            success:function(data){


                                location.reload();

                          //  window.open('Genpdf/print_sell', '_blank')


                             }

                        });




});




// js veiw_data---------------------------------------------------------------------------------------------

                $('#datatable-order-sell').DataTable({

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