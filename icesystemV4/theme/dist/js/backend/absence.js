<script> 
var url = $("#base_url").val();
		  $(document).ready(function(){

             $("#absence").submit(function(event) {
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


             $('#ab_work').DataTable({

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

             $('#ab_work2').DataTable({

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
           if(url == 'http://aodcat.esy.es/absence' ){ //เปลืยนด้วยเมือขึนhostจริง
              procss();
          }
        });
     var i = 1;
function procss() {
		setInterval(function () {
      var today = new Date();
      var hour = today.getHours();
      var minute = (today.getMinutes()<10?'0':'')+today.getMinutes();
      if(hour >= '11' && hour <= '23' ){
        if(i == 1){
          $.ajax({
            url: url + '/procss_absence',
            type: 'POST',
            dataType: "JSON",
            success: function (data) {
              $('#procss_absence').html('<a href="" type="button" class="btn btn-info btn-xs disabled"  style="float: right;font-size: 20px;margin-right:5px;"><i class="fa fa-check" aria-hidden="true"></i> ประมวลผลเรียบร้อยเเล้ว </a>');
              // location.reload();
            }
        });
      }
      i++;
      }else{
        i=1;
        $('#procss_absence').html('<a href="" type="button" class="btn btn-info btn-xs disabled"  style="float: right;font-size: 20px;margin-right:5px;"><i class="fa fa-spinner" aria-hidden="true"></i> รอประมวลผลในเวลา 11:00 น ของทุกวัน</a>');
        console.log(i);
      }
    },1000);
  }
	
</script>

