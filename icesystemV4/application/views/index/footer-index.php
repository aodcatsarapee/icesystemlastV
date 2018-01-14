<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>ที่อยู่</h3>
                    <p>295/1 ถนน แก้วนวรัฐ
                        <br>ตำบล วัดเกต อำเภอเมืองเชียงใหม่ เชียงใหม่ 50000</p>

                         
                </div>
                <div class="footer-col col-md-4">
                    <h3>facebook</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>เกี่ยวกับเรา</h3>
                    <p>ห้างหุ่นส่วนจำกัดโรงน้ำเเข็งธวีชัย<a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; icesystem 2018
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="<?php echo base_url(); ?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo base_url(); ?>js/contact_me.js"></script>
<!-- Theme JavaScript -->
<script src="<?php echo base_url(); ?>js/freelancer.min.js"></script>

<script src="<?php echo base_url(); ?>js/gmaps/gmaps.js"></script>

</body>

</html>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCt3-W4SY2v1rSAMXBKIRNAv-AeC17Ue70"> </script>
<script type="text/javascript">

$(function () {
        run_map();
    });

    function run_map() {
        lat = $('#set-building_latitude').val();
        lng = $('#set-building_longitude').val();
        map = new GMaps({
            div: '#map1',
            zoom: 16,
            lat: lat,
            lng: lng
        });
        if (lat == '' && lng == '') {
            geo();
        } else {
            add_marker(lat, lng);
        }
    }
    function add_marker(lat, lng) {
        $('#lat').val(lat);
        $('#lng').val(lng);
        map.addMarker({
            lat: lat,
            lng: lng,
            title: 'ลากเพื่อปักหมุด',
            draggable: true,
            dragend: function (event) {
                var lat = event.latLng.lat();
                var lng = event.latLng.lng();
                $('#lat').val(lat);
                $('#lng').val(lng);
            }
        });
    }
    function geo() {
        GMaps.geolocate({
            success: function (position) {
                $('#set-building_latitude').val(position.coords.latitude);
                $('#set-building_longitude').val(position.coords.longitude);
                map.setCenter(position.coords.latitude, position.coords.longitude);
                map.addMarker({
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                    title: 'Me',
                    draggable: true,
                    dragend: function (event) {
                        var lat = event.latLng.lat();
                        var lng = event.latLng.lng();
                        $('#lat').val(lat);
                        $('#lng').val(lng);
                    }
                });
            },
            error: function (error) {
                alert('Geolocation failed: ' + error.message);
            },
            not_supported: function () {
                alert("Your browser does not support geolocation");
            },
            always: function () {

            }
        });
    }

</script>
