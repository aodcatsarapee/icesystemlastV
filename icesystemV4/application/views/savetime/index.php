<!doctype html>
<html lang="en">

<head>
	<title>Hello, world!</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
	crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'Prompt', sans-serif;
		}

		h1 {
			font-family: 'Prompt', sans-serif;
		}

		h3  {
			font-family: 'Prompt', sans-serif;
		}
        h4{
            font-family: 'Prompt', sans-serif;
        }

	</style>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
	crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
	crossorigin="anonymous"></script>
</head>

<body>
	<div class="container-fluid">
		<div class="row header text-whlie">
        <span class="fa fa-clock-o fa-5x" aria-hidden="true" style="margin-right:10px;"></span>
			<h2>
				<b>ระบบลงเวลางาน</b><br> ห้างหุ่นส่วนจำกัดโรงน้ำเเข้งทวีชัยเชียงใหม่
            </h2>
		</div>
		<div class="row">
        <div class="col-1"></div>
			<div class="col-10">
				<!-- <div class="container"> -->
					<div class="content_main">
						<input type="text" class="form-control" name="employee_id" id="employee_id" aria-describedby="helpId" placeholder="" onkeypress="if (event.keyCode === 13) { enter(); }"
						autofocus>
                        <br>
                        <div class="row">
						<div class="card   mb-3 box" style="min-width: 25rem;">
							<div class="card-header"><h4>ชื่อ-นาสกุล</h4></div>
							<div class="card-body">
								<h4 class="card-title" style="padding-top:50px;">สรศักดิ์ ต้นเกณฑ์</h4>
							</div>
						</div>
                        <div class="card   mb-3 box" style="min-width: 25rem;">
							<div class="card-header"><h4 >เวลา</h4></div>
							<div class="card-body">
								<h4 class="card-title" style="padding-top:50px;">07:50</h4>
							</div>
						</div>
                        <div class="card   mb-3 box" style="min-width: 25rem;">
							<div class="card-header"><h4>สถานะ</h4></div>
							<div class="card-body">
								<h4 class="card-title" style="padding-top:50px;">เข้างาน</h4>
							</div>
						</div>

					</div>
                    <br>
                    <br>
                    <br>
                    <h4 id="dmytime" class="text-center"></h4>
					</div>
				
				<!-- </div> -->
			</div>
        
		</div>
	</div>
    <Footer class="fixed-bottom footer">
    <hr>
    <h5 style="margin-left:150px;">icesystem © 2018 All rights reserved. <span style="float:right; margin-right:150px;">Version 1.0</span></h5>
    </Footer>
</body>
</html>
<style>
	.header {
		height: 170px;
		background: #3C8DBC;
        padding: 50px 50px 0px 150px;
        color:#fff;
        
	}

	.content_main {
		margin-top: 50px;
		padding: 50px 50px 80px 50px;
		/* background: red; */
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}

	.box {
		margin: 0px 12px 0px 15px;
		/* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
		text-align: center;
		height: 250px;
	}
    .footer{
        /* background: red; */
        height:80px;
    }


</style>
<script>
	$(function () {
		run_time();
	});

	function run_time() {
		setInterval(function () {
			var today = new Date();
			var thday = new Array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์");
			var thmonth = new Array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม",
				"กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
			var month = thmonth[today.getMonth()];
			var day = thday[today.getDay()];
			var numday = today.getDate();
			var year = today.getFullYear() + 543;
			var hour = today.getHours();
			var minute = (today.getMinutes()<10?'0':'')+today.getMinutes();
			var seconds = (today.getSeconds()<10?'0':'')+today.getSeconds();
			var milliseconds = today.getMilliseconds();
			var output = 'วัน' + day + 'ที่ ' + numday + ' เดือน ' + month + ' พ.ศ. ' + year;
			var time = 'เวลา ' + hour + ':' + minute + ':' + seconds + ' นาที';
			$('#dmytime').text(output + " " + time);
		}, 1000);
	}

	function enter() {
		alert($('#employee_id').val());
	}

</script>
