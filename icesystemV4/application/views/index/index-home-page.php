<?php   

               if(@$_SESSION['type']!='customers'){

                        $disabled="disabled";

               }else{
                         $disabled="";

               }


 ?>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" >
        <div class="container">
        <div id="cart" >
            
        </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>รายการสินค้า</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
       
                <?php foreach($product as $item){ ?>

                <div class="col-sm-4 portfolio-item" >

                <form action="Index/cart" method="POST">

                     <input type="hidden" name="add" id="inputId" class="form-control" value="1">

                    <input type="hidden" name="h_pro_id" id="inputId" class="form-control" value="<?php echo $item['product_id']; ?>">

                    <input type="hidden" name="h_pro_name" id="inputId" class="form-control" value="<?php echo $item['product_name']; ?>">

                     <input type="hidden" name="h_pro_price" id="inputId" class="form-control" value="<?php echo $item['product_price']; ?>">

                    <button type="submit" class="portfolio-link" name="add_to_cart" style="padding: 0px; border: 0px;" <?php    echo $disabled; ?> >
                        <div class="caption" >

                            <div class="caption-content" >

                                <p class="product-list" >สั่งซื้อสินค้า</p>

                            </div>
                        </div>

                            <img src="<?php echo base_url(); ?>img/<?php echo $item['product_img']?>" class="img-responsive img-product" alt="Cabin"  >
                        <div style="font-size: 15px;" class=" bottomleft img-responsive" ><?php echo $item['product_name']?> <br> <?php echo "ราคา ".$item['product_price']." บาท"?></div>

                    </button>

                    </form>

                </div>

                <?php }?>

           <center> <i style="font-size: 20px">หากท่านต้องการสั่งชื้อสินค้ากรุณาเข้าสู้ระบบก่อน</i></center>
      </div>

        </div>
    </section>


    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About US</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>ห้างหุ้นส่วนจำกัด โรงน้ำแข็งทวีชัย ตั้งอยู่ที่ 295/1 ถนน แก้วนวรัฐ ตำบล วัดเกต อำเภอ เมือง จังหวัด เชียงใหม่ รหัสไปรษณีย์ 50000 จัดตั้งมากว่า 20 ปีสืบทอดต่อกันมาซึ่งในปัจจุบันเป็นของ ดร.อัครพล นิมลรัตน์ โดยห้างหุ้นส่วนจำกัด โรงน้ำแข็งทวีชัย นั้นทำกิจการขายน้ำแข็งหลายประเภทโดยรูปแบบการจัดจำหน่ายนั้น จะมีทั้งแบบให้คนรับไปค้าปลีกอีกต่อ หรือจัดส่งเอง </p>
                </div>
                <div class="col-lg-4">
                    <p>ผลิตภัณต์ส่วนใหญ่จัดเป็นน้ำแข็งแบบต่างๆ อาธิ น้ำแข็งหลอดเล็กใหญ่ น้ำแข็งโม่หรือน้ำแข็งเกร็ด และน้ำแข็งก้อน อีกทั้งกระบวนการผลิตยังสะอาดถูกหลักอนามัย โดยวิธีการสั่งนั้นสามารถสั่งได้โดยตรงหรือจะสั่งผ่านเว็ปไซต์นี้ก็ได้เพื่อความสะดวกรวดเร็วในการสั่งไม่ต้องรอ มาถึงรับได้เลยทันที</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
               
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" action="<?php echo base_url().'Index/contact'?>" method="POST">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="phone">Phone Number</label>
                                <input type="tel"  name="phone" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="message">Message</label>
                                <textarea rows="5" name="message" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="map">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>MAP</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
            <div class="col-md-12 " id="map1" style="height:600px;">

            </div>
        </div>
    </section>
    <input type="hidden" id="set-building_latitude"  value="18.798231" />
    <input type="hidden" id="set-building_longitude" value="99.009465" />

    