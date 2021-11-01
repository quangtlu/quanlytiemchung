<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê độ tuổi</title>
    <?php $this->view('frontend.public.base') ?>

</head>

<body>
    <?php $this->view('frontend.public.header') ?>
    <nav class="navbar navbar-light justify-content-between" style="background-color: #e3f2fd">
        <a href="./index.php?controller=thongkechung"><button class="btn btn-outline-primary">Thống kê đơn đăng ký</button></a>
        <a href="./index.php?controller=thongkechung&action=dotuoi"><button class="btn btn-success">Thống kê độ tuổi</button></a>
        <a href="./index.php?controller=thongkechung&action=muitiem"><button class="btn btn-outline-danger">Thống kê mũi tiêm</button></a>
        <a href="./index.php?controller=thongkechung&action=vaccine" ><button class="btn btn-outline-info">Thống kê vaccine</button></a>
        <form method="post" action="./index.php?controller=thongkechung&action=dotuoi" class="form-inline">
            <input name="tendonvi" class="form-control mr-sm-2" type="search" placeholder="Tên đơn vị tiêm" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form>
    </nav>
    <div class="container-fluid">
        <form method="post" action="./index.php?controller=thongkechung&action=dotuoi" class="form-inline mt-3">
            <div class="form-group mx-sm-3 mb-2">
                <label for="staticEmail2" title="Ngày tiêm" class="form-label">Ngày bắt đầu: </label>
                <input name="ngaybd" type="date" required class="form-control" id="staticEmail2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" title="Ngày tiêm" class="form-label">Ngày kết thúc: </label>
                <input name="ngaykt" type="date" required class="form-control" id="inputPassword2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="form-label">Thêm nhóm tuổi: </label>
                <input name="tuoibd" type="number" placeholder="Từ tuổi..." class="form-control" id="tuoibd">
                <input name="tuoikt" type="number" placeholder="Đến tuổi..." class="form-control" id="tuoikt">
            </div>
            <button type="submit" class="btn btn-success btn-sm mb-2">Thống kê</button>
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
            <H3 style="text-align:center; padding:10px 0 30px 0; color:#4263f5">THỐNG KÊ SỐ LƯỢNG NGƯỜI ĐÃ TIÊM THEO ĐỘ TUỔI</H3>
            <div class="container">
                <table id="tableExcel" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Đơn vị tiêm chủng</th>
                            <th scope="col">12 - 17 tuổi</th>
                            <th scope="col">18 - 35 tuổi</th>
                            <th scope="col">36 - 65 tuổi</th>
                            <th scope="col">66 tuổi trở lên</th>
                            <?php if (!empty($tuoibd) && !empty($tuoikt)) {
                                echo "<th scope='col'>$tuoibd - $tuoikt tuổi</th>";
                            } ?>
                            <th scope="col">Tổng cộng</th>
                            <th class='ignore' scope="col">Xem</th>
                        </tr>
                    </thead>
                    <tbody class="row-table">
                        <?php
                        $max = count($tendonvis) + 1;
                        if (!empty($age5)) {
                            for ($i = 0; $i < count($tendonvis); $i++) {
                                $stt = $i + 1;
                                $sum = 0;

                                $sumAge1 += $age1[$i]["soluong"];
                                $sumAge2 += $age2[$i]["soluong"];
                                $sumAge3 += $age3[$i]["soluong"];
                                $sumAge4 += $age4[$i]["soluong"];
                                $sumAge5 += $age5[$i]["soluong"];
                                $total = $sumAge1 + $sumAge2 + $sumAge3 + $sumAge4 + $sumAge5;

                                $sum += $age1[$i]["soluong"] + $age2[$i]["soluong"] + $age3[$i]["soluong"] + $age4[$i]["soluong"] + $age5[$i]["soluong"] ;


                                echo
                                "<tr class='row-content'>
                                        <td>$stt</td>
                                        <td>" . $tendonvis[$i]["TenDonVi"] . "</td>
                                        <td>" . $age1[$i]["soluong"] . "</td>
                                        <td>" . $age2[$i]["soluong"] . "</td>
                                        <td>" . $age3[$i]["soluong"] . "</td>
                                        <td>" . $age4[$i]["soluong"] . "</td>
                                        <td>" . $age5[$i]["soluong"] . "</td>
                                        <td style='font-weight:bold'>" . $sum. "</td>
                                        <td class='ignore'><a href='./index.php?controller=thongkechung&action=detail&tendonvi=".$tendonvis[$i]["TenDonVi"]."'><i class='editBtn far fa-eye'></i></a></td>
                                    </tr>";
                            }

                            echo "
                                <tr style='font-weight:600' class='row-content'>
                                    <td>$max</td>
                                    <td>Tổng cộng</td>
                                    <td>" . $sumAge1 . "</td>
                                    <td>" . $sumAge2 . "</td>
                                    <td>" . $sumAge3 . "</td>
                                    <td>" . $sumAge4 . "</td>
                                    <td>" . $sumAge5 . "</td>
                                    <td>" . $total . "</td>
                                    <td class='ignore'><a href='./index.php?controller=thongkechung&action=detail&tendonvi=all'><i class='editBtn far fa-eye'></i></a></td>

                                </tr>";
                        } else {
                            for ($i = 0; $i < count($tendonvis); $i++) {
                                $stt = $i + 1;
                                $sum = 0;
                                $sumAge1 += $age1[$i]["soluong"];
                                $sumAge2 += $age2[$i]["soluong"];
                                $sumAge3 += $age3[$i]["soluong"];
                                $sumAge4 += $age4[$i]["soluong"];

                                $total = $sumAge1 + $sumAge2 + $sumAge3 + $sumAge4;


                                $sum += $age1[$i]["soluong"] + $age2[$i]["soluong"] + $age3[$i]["soluong"] + $age4[$i]["soluong"];

                                echo
                                "<tr class='row-content'>
                                        <td>$stt</td>
                                        <td>" . $tendonvis[$i]["TenDonVi"] . "</td>
                                        <td>" . $age1[$i]["soluong"] . "</td>
                                        <td>" . $age2[$i]["soluong"] . "</td>
                                        <td>" . $age3[$i]["soluong"] . "</td>
                                        <td>" . $age4[$i]["soluong"] . "</td>
                                        <td style='font-weight:bold'>" . $sum. "</td>
                                        <td class='ignore'><a href='./index.php?controller=thongkechung&action=detail&tendonvi=".$tendonvis[$i]["TenDonVi"]."'><i class='editBtn far fa-eye'></i></a></td>    
                                    </tr>";
                            }
                            echo "
                                <tr style='font-weight:600' class='row-content'>
                                    <td>$max</td>
                                    <td>Tổng cộng</td>
                                    <td>" . $sumAge1 . "</td>
                                    <td>" . $sumAge2 . "</td>
                                    <td>" . $sumAge3 . "</td>
                                    <td>" . $sumAge4 . "</td>
                                    <td>" . $total . "</td>
                                    <td class='ignore'><a href='./index.php?controller=thongkechung&action=detail&tendonvi=all'><i class='editBtn far fa-eye'></i></a></td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
                        
        <!-- Danh sách chi tiết người dân  -->
        
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
                    filename: "Thống kê theo độ tuổi",
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
        var dataAge1 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $age1[$i]["soluong"] . "',";
            } ?>
        ]
        var dataAge2 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $age2[$i]["soluong"] . "',";
            } ?>
        ]
        var dataAge3 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $age3[$i]["soluong"] . "',";
            } ?>
        ]
        var dataAge4 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $age4[$i]["soluong"] . "',";
            } ?>
        ]
        var dataAge5 = [
            <?php if (!empty($age5)) {
                for ($i = 0; $i < count($tendonvis); $i++) {
                    print "'" . $age5[$i]["soluong"] . "',";
                };
            } ?>
        ]
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {

                labels: labelList,
                datasets: [{
                        label: '12 - 17 tuổi',
                        data: dataAge1,
                        backgroundColor: [
                            'rgba(79, 195, 247, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: '18 - 35 tuổi',
                        data: dataAge2,
                        backgroundColor: [
                            'rgba(244, 67, 54, 0.2)',

                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: '36 - 65 tuổi',
                        data: dataAge3,
                        backgroundColor: [
                            'rgba(26, 35, 126, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: '66 tuổi trở lên',
                        data: dataAge4,
                        backgroundColor: [
                            'rgba(124, 179, 66, 0.2)',

                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    <?php if (!empty($age5)) {
                        echo "
                        {
                            label: '$tuoibd - $tuoikt tuổi',
                            data: dataAge5,
                            backgroundColor: [
                                'rgba(255, 193, 7, 0.2)',
            
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                            ],
                            borderWidth: 1
                        },
                    ";
                    } ?>
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
                        text: 'Biểu đồ thể hiện số lượng người đân đã tiêm theo nhóm tuổi',
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