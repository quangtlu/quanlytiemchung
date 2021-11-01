<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê độ tuổi</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <nav class="navbar navbar-light justify-content-between" style="background-color: #e3f2fd">
        <a  href="./index.php?controller=thongketheodonvi"><button class="btn btn-outline-primary">Thống kê mũi tiêm</button></a>
        <a href="./index.php?controller=thongketheodonvi&action=dotuoi" ><button class="btn btn-success">Thống kê độ tuổi</button></a>
        <a href="./index.php?controller=thongketheodonvi&action=vaccine" ><button class="btn btn-outline-danger">Thống kê vaccine</button></a>
        <form method="post" action="./index.php?controller=thongketheodonvi&action=dotuoi" class="form-inline">
            <input name="donvi" class="form-control mr-sm-2" type="search" placeholder="Tên đơn vị tiêm" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form>
    </nav>
    <div class="container-fluid">
        <form method="post" action="./index.php?controller=thongketheodonvi&action=dotuoi" class="form-inline mt-3">
            <div class="form-group mb-2">
                <label for="staticEmail2" class="form-label">Ngày bắt đầu</label>
                <input name="ngaybd" type="date" class="form-control" id="staticEmail2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="form-label">Ngày kết thúc</label>
                <input name="ngaykt" type="date" class="form-control" id="inputPassword2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="form-label mr-2">Đơn vị tiêm chủng</label>
                <select name="donvi" id="" required class="form-control">
                    <option value=""></option>
                    <?php foreach($donvis as $item){
                        echo "<option value='${item["TenDonVi"]}'>${item["TenDonVi"]}</option>"; 
                    } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-sm mb-2">Thống kê</button>
        </form>
        <button id="pdf" type="button" class="btn btn-outline-info btn-sm">Xuất file PDF</button>
        <button id="excel" type="button" class="btn btn-outline-info btn-sm">Xuất file Excel</button>
          <!-- Biểu đồ -->
        <button id="showChart" style="display: none;" type="button" class="btn btn-outline-info btn-sm">Xem biểu đồ</button>
        <button id="hideChart" type="button" class="btn btn-outline-info btn-sm" style="<?php if(empty($tendonvi)){echo"display:none";} ?>">Ẩn biểu đồ</button>
        <div class="container chart-pie" id="chart-container" style="<?php if(empty($tendonvi)){echo"display:none";} ?>">
            <canvas id="myChart"></canvas>
        </div>          
        <div id="table" class="tableFixHead table-responsive mt-3" style="<?php if(empty($tendonvi)){echo"display:none";} ?>">
            <H4 style="text-align:center; padding:10px 0 30px 0; color:#4263f5">THỐNG KÊ SỐ LƯỢNG NGƯỜI DÂN THEO ĐỘ TUỔI</H4>
            <div class="container">
                <span><b>Đơn vị tiêm chủng:</b>  <?php echo $tendonvi ?></span>
                <table id="tableExcel" class="table table-bordered mt-2">
                    <thead class="" style="background-color: #17a2b8;color:#fff">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Nhóm tuổi</th>
                            <th scope="col">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody class="row-table">
                        <?php 
                            $sum = $age1[0]['soluong'] + $age2[0]['soluong'] + $age3[0]['soluong'] + $age4[0]['soluong'] ;
                            echo "
                                <tr class='row-content'>
                                    <td>1</td>
                                    <td>12 - 17 tuổi</td>
                                    <td>".$age1[0]['soluong']."</td>
                                </tr>
                                <tr class='row-content'>
                                    <td>2</td>
                                    <td>18 - 35 tuổi</td>
                                    <td>".$age2[0]['soluong']."</td>
                                </tr>
                                <tr class='row-content'>
                                    <td>3</td>
                                    <td>36 - 65 tuổi</td>
                                    <td>".$age3[0]['soluong']."</td>
                                </tr>
                                <tr class='row-content'>
                                    <td>4</td>
                                    <td>66 tuổi trở lên</td>
                                    <td>".$age4[0]['soluong']."</td>
                                </tr>
                                <tr style='font-weight:bold' class='row-content'>
                                    <td>5</td>
                                    <td>Tổng cộng</td>
                                    <td>".$sum."</td>
                                </tr>
                                "
                            
                                ;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <?php $this->view('frontend.public.footer') ?>
    <?php $this->view('frontend.public.js.pdf') ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <!-- excel -->
    <script>
        $(document).ready(function() {
            $('#excel').on('click', function(e){
                $("#tableExcel").table2excel({
                    exclude: ".ignore",
                    name: "Data",
                    filename: "Thống kê theo mũi tiêm",
                });
            });
        });
    </script>
    <!-- Biểu đồ -->
    <script>
        var canvas = document.getElementById("myChart");
        var ctx = canvas.getContext('2d');
        var data = {
            labels: ['12 - 17 tuổi','18 - 35 tuổi','36 - 65 tuổi','66 tuổi trở lên'],
            datasets: [
                {
                    fill: true,
                    backgroundColor: [
                        <?php
                            for ($i = 0; $i < 4; $i++) {
                                $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
                                $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
                                echo "'".$color."',";
                            }   
                        ?>
                    ],
                    data: [<?php echo "".$age1[0]["soluong"].",".$age2[0]["soluong"].",".$age3[0]["soluong"].",".$age4[0]["soluong"]."" ?>],
                    borderColor: 'white',
                    borderWidth: 1
                }
            ]
        };

        // Notice the rotation from the documentation.

        var options = {
                rotation: -0.7 * Math.PI,
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        font:{
                            size:18
                        },
                        text: 'Biểu đồ thể hiện số lượng người đân đã tiêm theo mũi tiêm',
                    },
                    
                }
        };


        // Chart declaration:
        var myBarChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });

        // Fun Fact: I've lost exactly 3 of my favorite T-shirts and 2 hoodies this way :|

        document.querySelector("#showChart").onclick = function() {
            document.querySelector("#chart-container").style.display = "block";
            document.querySelector("#showChart").style.display = "none";
            document.querySelector("#hideChart").style.display = "inline-block";
        }
        document.querySelector("#hideChart").onclick = function() {
            document.querySelector("#showChart").style.display = "inline-block";
            document.querySelector("#hideChart").style.display = "none";
            document.querySelector("#chart-container").style.display = "none";
        }
    </script>
</body>

</html>