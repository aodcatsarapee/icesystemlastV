<script>

     $(document).ready(function(){

         
             });

</script>

  <form class="form-horizontal" method="POST" id="salaly_month" name="salaly_month" enctype="multipart/form-data" action="salaly_month/insert_salaly">
           <div class="form-group ">
            <label class="col-sm-3 control-label" >รหัสพนักงาน :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $os['employee_id']; ?>" >
              </fieldset>
            </div>
          </div>

          <div class="form-group ">
            <label class="col-sm-3 control-label" >เงินเดือนต่อวันละ :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $os['salaly_set']; ?>" >
              </fieldset>
            </div>
          </div>


           <div class="form-group ">
            <label class="col-sm-3 control-label" >จำนวนวันที่เข้างาน :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $rs; ?>" >
              </fieldset>
            </div>
          </div>

           <input type="hidden" name="employee_id" class="form-control" value="<?php echo $os['employee_id']; ?>">

            <div class="form-group ">
            <label class="col-sm-3 control-label" >จำนวนวีนที่ขาดงาน :</label>
            <div class="col-sm-7">
            <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $ab; ?>" >
              </fieldset>
            </div>
          </div>
              <?php $salaly = 0;
                     $salaly = $rs*$os['salaly_set']; ?>


            <?php 
                function DateDiff($strDate1,$strDate2)

          {

                 return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24

          }

            $before = $re['rest_before'];
            $after = $re['rest_after'];

            if( $after !="" && $after !=""){

              $Datetotal =DateDiff($before,$after)+1;
              
            }else{
              $Datetotal=0;
            }

    
             ?>


           <div class="form-group ">
            <label class="col-sm-3 control-label" >จำนวนวันลาหยุด :</label>
            <div class="col-sm-7">
              <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $Datetotal; ?>" >
              </fieldset>
            </div>
          </div>



          <div class="form-group ">
            <label class="col-sm-3 control-label" >จำนวนเงินเดือนรวม :</label>
            <div class="col-sm-7">
              <fieldset disabled>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $salaly; ?>" >
              </fieldset>
            </div>
          </div>



          


          <input type="hidden" name="salaly_months" class="form-control" value="<?php echo $salaly; ?>">
           <input type="hidden" name="salaly_rest" class="form-control" value="<?php echo $Datetotal; ?>">
           <input type="hidden" name="salaly_in_work" class="form-control" value="<?php echo $rs; ?>">
           

           <input type="hidden" name="fullname" class="form-control" value="<?php echo $os['employee_fname']." ".$os['employee_lname'] ?>">

 			
<?php 

  $total_money = 0;
  // $total_money = $salaly + $md['salaly_total'];

 ?>

          <input type="hidden" name="salaly_total" class="form-control" value="<?php echo $total_money; ?>">
          <input type="hidden" name="absence_total" class="form-control" value="<?php echo $ab; ?>">

          <?php if( $_SESSION['type']=='manager'){?>
            <input type="submit" class="btn btn-default " id="insert" value=" จ่ายเงินเดือน " aria-hidden="true" style="float: right;font-size: 15px;" disabled >

          <?php } else{ ?>

            <input type="submit" class="btn btn-default" id="insert" value=" จ่ายเงินเดือน " style="float: right;font-size: 15px;">

        <?php  }?>
        </form>
        <br><br>