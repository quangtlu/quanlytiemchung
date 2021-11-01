<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê theo mũi tiêm</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <nav class="navbar navbar-light justify-content-between" style="background-color: #e3f2fd">
        <a  href="./index.php?controller=thongkechung"><button class="btn btn-outline-primary">Thống kê đơn đăng ký</button></a>
        <a href="./index.php?controller=thongkechung&action=dotuoi"><button class="btn btn-outline-success">Thống kê độ tuổi</button></a>
        <a href="./index.php?controller=thongkechung&action=muitiem"><button class="btn btn-danger">Thống kê mũi tiêm</button></a>
        <a href="./index.php?controller=thongkechung&action=vaccine" ><button class="btn btn-outline-info">Thống kê loại vaccine</button></a>
        <form method="post" action="./index.php?controller=thongkechung&action=muitiem" class="form-inline">
            <input name="tendonvi" class="form-control mr-sm-2" type="search" placeholder="Tên đơn vị tiêm" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form>
    </nav>
    <div class="container-fluid">
        <form method="post" action="./index.php?controller=thongkechung&action=muitiem" class="form-inline mt-3">
            <div class="form-group mx-sm-3 mb-2">
                <label for="staticEmail2" class="form-label">Ngày bắt đầu: </label>
                <input name="ngaybd" type="date" required class="form-control" id="staticEmail2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="form-label">Ngày kết thúc: </label>
                <input name="ngaykt" type="date" required class="form-control" id="inputPassword2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
            <label for="muitiemthu" class="form-label">Mũi tiêm: </label>
                <input name="muitiemthu" type="number" placeholder="Mũi tiêm thứ" class="form-control" id="muitiemthu">
            </div>
            <button type="submit" class="btn btn-danger btn-sm mb-2">Thống kê</button>
        </form>
        <button id="pdf" type="button" class="btn btn-outline-info btn-sm">Xuất file PDF</button>
        
        <button type="button" id="excel" class="btn btn-outline-info btn-sm">Xuất file Excel</button>
        <!-- Biểu đồ -->
        <button id="showChart" style="display: none;" type="button" class="btn btn-outline-info btn-sm">Xem biểu đồ</button>
        <button id="hideChart" type="button" class="btn btn-outline-info btn-sm">Ẩn biểu đồ</button>
        <div style="margin: 0 auto;" id="chart-container">
            <canvas style="height:40vh; width:80vw;" id="myChart"></canvas>
        </div>

        <!-- Bảng thống kê -->
        
        <div id="table" class="tableFixHead table-responsive mt-3">
            <div class="container">
                <h4 style="text-align:center; padding:10px 0; color:#4263f5">THỐNG KÊ SỐ LƯỢNG NGƯỜI ĐÃ TIÊM THEO MŨI TIÊM</h4>
                <table data-excel-name="THỐNG KÊ SỐ LƯỢNG NGƯỜI ĐÃ TIÊM THEO MŨI TIÊM" id="tableExcel" class="table table-bordered">
                    <thead >
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Đơn vị tiêm chủng</th>
                            <th scope="col">Mũi thứ 1</th>
                            <th scope="col">Mũi thứ 2</th>
                            <th scope="col">Mũi thứ 3</th>
                            <?php  if(!empty($muitiemthu)){
                                echo "<th scope='col'>Mũi thứ ${muitiemthu}</th>";
                            }?>
                            <th scope="col">Tổng cộng</th>
                            <th class='ignore' scope="col">Xem</th>
                        </tr>
                    </thead>
                    <tbody class="row-table">
                        <?php 
                            $max = count($tendonvis) + 1;
                            if(!empty($mui)){
                                for($i = 0; $i<count($tendonvis);$i++){
                                    $stt = $i+1;
                                    $sum = 0;
                                    $sumMui1 += $mui1[$i]["soluong"];
                                    $sumMui2 += $mui2[$i]["soluong"];
                                    $sumMui3 += $mui3[$i]["soluong"];
                                    $sumMui += $mui[$i]["soluong"];

                                    $total = $sumMui1 + $sumMui2 + $sumMui3 + $sumMui;

                                    $sum += $mui1[$i]["soluong"] + $mui2[$i]["soluong"] + $mui3[$i]["soluong"] +$mui[$i]["soluong"] ;
                                    echo 
                                    "<tr class='row-content'>
                                        <td>$stt</td>
                                        <td>".$tendonvis[$i]["TenDonVi"]."</td>
                                        <td>".$mui1[$i]["soluong"]."</td>
                                        <td>".$mui2[$i]["soluong"]."</td>
                                        <td>".$mui3[$i]["soluong"]."</td>
                                        <td>".$mui[$i]["soluong"]."</td>
                                        <td style='font-weight:bold'>" . $sum. "</td>
                                        <td  class='ignore'><a href='./index.php?controller=thongkechung&action=detail&tendonvi=".$tendonvis[$i]["TenDonVi"]."'><i class='editBtn far fa-eye'></i></a></td>
                                    </tr>";
                                }
                                echo "
                                <tr style='font-weight:600' class='row-content'>
                                    <td>$max</td>
                                    <td>Tổng cộng</td>
                                    <td>".$sumMui1."</td>
                                    <td>".$sumMui2."</td>
                                    <td>".$sumMui3."</td>
                                    <td>".$sumMui."</td>
                                    <td>" . $total . "</td>
                                    <td  class='ignore'><a href='./index.php?controller=thongkechung&action=detail&tendonvi=all'><i class='editBtn far fa-eye'></i></a></td>

                                </tr>";
                            }
                            else{
                                for($i = 0; $i<count($tendonvis);$i++){
                                    $stt = $i+1;
                                    $sum = 0;
                                    $sumMui1 += $mui1[$i]["soluong"];
                                    $sumMui2 += $mui2[$i]["soluong"];
                                    $sumMui3 += $mui3[$i]["soluong"];

                                    $total = $sumMui1 + $sumMui2 + $sumMui3;

                                    $sum += $mui1[$i]["soluong"] + $mui2[$i]["soluong"] + $mui3[$i]["soluong"];

                                    echo 
                                    "<tr class='row-content'>
                                        <td>$stt</td>
                                        <td>".$tendonvis[$i]["TenDonVi"]."</td>
                                        <td>".$mui1[$i]["soluong"]."</td>
                                        <td>".$mui2[$i]["soluong"]."</td>
                                        <td>".$mui3[$i]["soluong"]."</td>
                                        <td style='font-weight:bold'>" . $sum. "</td>
                                        <td  class='ignore'><a href='./index.php?controller=thongkechung&action=detail&tendonvi=".$tendonvis[$i]["TenDonVi"]."'><i class='editBtn far fa-eye'></i></a></td>      
                                    </tr>";
                                }
                                echo "
                                <tr style='font-weight:600' class='row-content'>
                                    <td>$max</td>
                                    <td>Tổng cộng</td>
                                    <td>".$sumMui1."</td>
                                    <td>".$sumMui2."</td>
                                    <td>".$sumMui3."</td>
                                    <td>" . $total . "</td>
                                    <td  class='ignore'><a href='./index.php?controller=thongkechung&action=detail&tendonvi=all'><i class='editBtn far fa-eye'></i></a></td>

                                </tr>";
                                
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php $this->view('frontend.public.footer') ?>
    <?php $this->view('frontend.public.js.pdf') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <!-- chart -->
<script>
        var labelList = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $tendonvis[$i]["TenDonVi"] . "',";
            } ?>
        ]
        var dataMui1 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $mui1[$i]["soluong"] . "',";
            } ?>
        ]
        var dataMui2 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $mui2[$i]["soluong"] . "',";
            } ?>
        ]
        var dataMui3 = [
            <?php for ($i = 0; $i < count($tendonvis); $i++) {
                print "'" . $mui3[$i]["soluong"] . "',";
            } ?>
        ]
        var dataMui = [
            <?php if (!empty($mui)) {
                for ($i = 0; $i < count($tendonvis); $i++) {
                    print "'" . $mui[$i]["soluong"] . "',";
                };
            } ?>
        ]
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {

                labels: labelList,
                datasets: [{
                        label: 'Mũi thứ 1',
                        data: dataMui1,
                        backgroundColor: [
                            'rgba(79, 195, 247, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Mũi thứ 2',
                        data: dataMui2,
                        backgroundColor: [
                            'rgba(244, 67, 54, 0.2)',

                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Mũi thứ 3',
                        data: dataMui3,
                        backgroundColor: [
                            'rgba(26, 35, 126, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    <?php if (!empty($age5)) {
                        echo "
                        {
                            label: 'Mũi thứ $muitiemthu',
                            data: dataMui,
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
                        text: 'Biểu đồ thể hiện số lượng người đân đã tiêm theo mũi tiêm',
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