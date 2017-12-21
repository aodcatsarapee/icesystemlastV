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
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Prompt', sans-serif;
        }
        h1 {
            font-family: 'Prompt', sans-serif;
        }
        h3 {
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
    <div class="row header">
        <h2><b>ระบบลงเวลางาน</b> ห้างหุ่นส่วนจำกัดโรงน้ำเเข้งทวีชัยเชียงใหม่</h2>

    </div>
    <div class="row">
        <div class="col-md-8 content_main">
            <div class="container">
                <div class="form-group">
                    <label for=""></label>
                    <input type="text" class="form-control" name="employee_id" id="employee_id" aria-describedby="helpId" placeholder=""  onkeypress="if (event.keyCode === 13) { enter(); }" autofocus>
                </div>
            </div>
        </div>
        <div class="col-md-2 content_right ">
            <table class="table table-bordered">
                <head>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ นามสกุล</th>
                    </tr>
                </head>
                <tbody>
                <tr>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2  ">ออกงานเเล้ว</div>
    </div>
    <h1 id="dmytime"></h1>
</div>
</body>
</html>
<style>
    .header{
        height: 60px;
        background:#3C8DBC;
    }
    .content_main{
        height: auto;
        /* background: red; */
    }
    .content_right{
        height: auto;
        background:yellow;
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
            var thmonth = new Array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
            var month = thmonth[today.getMonth()];
            var day = thday[today.getDay()];
            var numday = today.getDate();
            var year = today.getFullYear() + 543;
            var hour = today.getHours();
            var minute = today.getMinutes();
            var seconds = today.getSeconds();
            var milliseconds = today.getMilliseconds();
            var output = 'วัน' + day + 'ที่ ' + numday + ' เดือน ' + month + ' พ.ศ. ' + year;
            var time = 'เวลา ' + hour + ':' + minute + ':' + seconds + ' นาที';
            $('#dmytime').text(output + " " + time);
        }, 1000);
    }
    function enter(){
        alert($('#employee_id').val());
    }
</script>