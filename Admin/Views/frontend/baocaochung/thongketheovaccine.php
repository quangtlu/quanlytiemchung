<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê Vaccine</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <nav class="navbar navbar-light justify-content-between" style="background-color: #e3f2fd">
        <a  href="./index.php?controller=thongkechung"><button class="btn btn-outline-primary">Thống kê đơn đăng ký</button></a>
        <a href="./index.php?controller=thongkechung&action=dotuoi" ><button class="btn btn-outline-success">Thống kê độ tuổi</button></a>
        <a href="./index.php?controller=thongkechung&action=muitiem" ><button class="btn btn-outline-danger">Thống kê mũi tiêm</button></a>
        <a href="./index.php?controller=thongkechung&action=vaccine" ><button class="btn btn-info">Thống kê loại vaccine</button></a>
        <form method="post" action="./index.php?controller=thongkechung" class="form-inline">
            <input name="tendonvi" class="form-control mr-sm-2" type="search" placeholder="Tên đơn vị tiêm" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form>
    </nav>
    <div class="container">
        <form method="post" action="./index.php?controller=thongkechung" class="form-inline mt-3">
            <div class="form-group mb-2">
                <label for="staticEmail2" class="form-label">Ngày bắt đầu</label>
                <input name="ngaybd" type="date" required class="form-control" id="staticEmail2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="form-label">Ngày kết thúc</label>
                <input name="ngaykt" type="date" required class="form-control" id="inputPassword2">
            </div>
            <button type="submit" class="btn btn-info btn-sm mb-2">Thống kê</button>
        </form>
        <button id="pdf" type="button" class="btn btn-outline-info btn-sm">Xuất file PDF</button>
        <button id="excel" type="button" class="btn btn-outline-info btn-sm">Xuất file Excel</button>
        <!-- Biểu đồ -->
        <button id="showChart" style="display: none;" type="button" class="btn btn-outline-info btn-sm">Xem biểu đồ</button>
        <button id="hideChart" type="button" class="btn btn-outline-info btn-sm">Ẩn biểu đồ</button>
        <div style="margin: 0 auto;" id="chart-container">
            <canvas style="height:40vh; width:80vw;" id="myChart"></canvas>
        </div>

        <!-- Bảng thống kê -->

        <div id="table" class="tableFixHead table-responsive mt-3">
            <H3 style="text-align:center; padding:10px 0 30px 0; color:#4263f5">THỐNG KÊ SỐ LƯỢNG NGƯỜI ĐÃ TIÊM THEO VACCINE</H3>
            <div class="container">
                <table id="tableExcel" class="table table-bordered">
                    <thead class="" style="background-color: #17a2b8;color:#fff">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên đơn vị</th>
                            <th scope="col">Vaccine AstraZeneca</th>
                            <th scope="col">Gam-COVID-Vac</th>
                            <th scope="col">Vero Cell</th>
                            <th scope="col">Vaccine Comirnaty</th>
                            <th scope="col">Vaccine Spikevax</th>
                            <th scope="col">Vaccine Janssen</th>
                            <th scope="col">Tổng cộng</th>
                            <th class='ignore' scope="col">Xem danh sách</th>

                        </tr>
                    </thead>
                    <tbody class="row-table">
                        <?php 
                            for($i = 0; $i<count($tendonvis);$i++){
                                $stt = $i+1;
                                $sum = 0;
                                $sumVaccine1 += $vaccine1[$i]["soluong"];
                                $sumVaccine2 += $vaccine2[$i]["soluong"];
                                $sumVaccine3 += $vaccine3[$i]["soluong"];
                                $sumVaccine4 += $vaccine4[$i]["soluong"];
                                $sumVaccine5 += $vaccine5[$i]["soluong"];
                                $sumVaccine6 += $vaccine6[$i]["soluong"];

                                $total = $sumVaccine1 + $sumVaccine2 + $sumVaccine3 + $sumVaccine4 + $sumVaccine5 + $sumVaccine6;

                                $sum += $vaccine1[$i]["soluong"] + $vaccine2[$i]["soluong"] + $vaccine3[$i]["soluong"] +$vaccine4[$i]["soluong"] +$vaccine5[$i]["soluong"] +$vaccine6[$i]["soluong"]  ;
    
                                echo 
                                "<tr class='row-content'>
                                    <td>$stt</td>
                                    <td>".$tendonvis[$i]["TenDonVi"]."</td>
                                    <td>".$vaccine1[$i]["soluong"]."</td>
                                    <td>".$vaccine2[$i]["soluong"]."</td>
                                    <td>".$vaccine3[$i]["soluong"]."</td>
                                    <td>".$vaccine4[$i]["soluong"]."</td>
                                    <td>".$vaccine5[$i]["soluong"]."</td>
                                    <td>".$vaccine6[$i]["soluong"]."</td>
                                    <td style='font-weight:bold'>" . $sum. "</td>
                                    <td class='ignore'><a href='./index.php?controller=thongkechung&action=detail&tendonvi=".$tendonvis[$i]["TenDonVi"]."'><i class='editBtn far fa-eye'></i></a></td>
                                </tr>
                                ";
                            }
                            $max = count($tendonvis) + 1;
                            echo "
                            <tr style='font-weight:600' class='row-content'>
                                <td>$max</td>
                                <td>Tổng cộng</td>
                                <td>".$sumVaccine1."</td>
                                <td>".$sumVaccine2."</td>
                                <td>".$sumVaccine3."</td>
                                <td>".$sumVaccine4."</td>
                                <td>".$sumVaccine5."</td>
                                <td>".$sumVaccine6."</td>
                                <td>" . $total . "</td>
                                <td class='ignore'><a href='./index.php?controller=thongkechung&action=detail&tendonvi=all'><i class='editBtn far fa-eye'></i></a></td>
                            </tr>";
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
                    filename: "Thống kê theo vaccine",
                });
            });
        });
    </script>
     <!-- Biểu đồ -->
     <script>
        var labelList = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $tendonvis[$i]["TenDonVi"] . "',";
            } ?>
        ]
        var dataVacccine1 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $vaccine1[$i]["soluong"] . "',";
            } ?>
        ]
        var dataVacccine2 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $vaccine2[$i]["soluong"] . "',";
            } ?>
        ]
        var dataVacccine3 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $vaccine3[$i]["soluong"] . "',";
            } ?>
        ]
        var dataVacccine4 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $vaccine4[$i]["soluong"] . "',";
            } ?>
        ]
        var dataVacccine5 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $vaccine5[$i]["soluong"] . "',";
            } ?>
        ]
        var dataVacccine6 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $vaccine6[$i]["soluong"] . "',";
            } ?>
        ]
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {

                labels: labelList,
                datasets: [{
                        label: 'Vaccine AstraZeneca	',
                        data: dataVacccine1,
                        backgroundColor: [
                            'rgba(79, 195, 247, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Gam-COVID-Vac',
                        data: dataVacccine2,
                        backgroundColor: [
                            'rgba(244, 67, 54, 0.2)',

                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Vero Cell',
                        data: dataVacccine3,
                        backgroundColor: [
                            'rgba(26, 35, 126, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Vaccine Comirnaty',
                        data: dataVacccine4,
                        backgroundColor: [
                            'rgba(10, 200, 19, 0.2)',

                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Vaccine Spikevax',
                        data: dataVacccine5,
                        backgroundColor: [
                            'rgba(100, 20, 19, 0.2)',

                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Vaccine Janssen',
                        data: dataVacccine6,
                        backgroundColor: [
                            'rgba(200, 200, 19, 0.2)',

                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                ]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        min: 0,
                        ticks: {
                            stepSize: 1
                        },
                        beginAtZero: true,
                        stacked: true,
                    },
                    y: {
                        beginAtZero: true,
                        stacked: true,
                        min: 0,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                        font:{
                            size:20
                        },
                        text: 'Biểu đồ thể hiện số lượng người đã tiêm theo loại vaccine trong từng đơn vị'
                    },
                }
            }
        });

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