<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dân</title>
    <?php $this->view('frontend.public.base') ?>

</head>

<body>
    <?php $this->view('frontend.public.header') ?>
    <nav class="navbar navbar-light justify-content-between" style="background-color: #e3f2fd">
        <a href="./index.php?controller=thongkechung"><button class="btn btn-outline-primary">Thống kê đơn đăng ký</button></a>
        <a href="./index.php?controller=thongkechung&action=dotuoi"><button class="btn btn-outline-success">Thống kê độ tuổi</button></a>
        <a href="./index.php?controller=thongkechung&action=muitiem"><button class="btn btn-outline-danger">Thống kê mũi tiêm</button></a>
        <a href="./index.php?controller=thongkechung&action=vaccine" ><button class="btn btn-outline-info">Thống kê vaccine</button></a>
        <form method="post" action="./index.php?controller=thongkechung&action=dotuoi" class="form-inline">
            <input name="tendonvi" class="form-control mr-sm-2" type="search" placeholder="Tên đơn vị tiêm" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form>
    </nav>
    <div class="container-fluid">
        <button id="pdf" type="button" class="btn btn-outline-info btn-sm">Xuất file PDF</button>
        <button id="excel" type="button" class="btn btn-outline-info btn-sm">Xuất file Excel</button>
        <!-- Bảng thống kê -->
        <div id="table" class="tableFixHead table-responsive mt-3">
            <H3 style="text-align:center; padding:10px 0 30px 0; color:#4263f5">DANH SÁCH NGƯỜI DÂN ĐÃ TIÊM</H3>
            <div class="container-fluid">
            <?php if(isset($tendonvi)) 
            echo "<span><b>Đơn vị tiêm chủng:</b>$tendonvi</span>" ?>
                <table id="tableExcel" class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">CMND/CCCD</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody class="row-table">
                        <?php
                            $i = 0;
                            foreach($users as $item){
                                $i++;
                                echo "
                                    <tr class='row-content'>
                                        <td>$i</td>
                                        <td>${item["HoTen"]}</td>
                                        <td>${item["CMND"]}</td>
                                        <td>${item["GioiTinh"]}</td>
                                        <td>${item["NgaySinh"]}</td>
                                        <td>${item["SDT"]}</td>
                                        <td>${item["DiaChi"]}</td>
                                    </>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
                        
    </div>
    <?php $this->view('frontend.public.footer') ?>
    <?php $this->view('frontend.public.js.pdf') ?>
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <!-- excel -->
    <script>
        $(document).ready(function() {
            $('#excel').on('click', function(e){
                $("#tableExcel").table2excel({
                    exclude: ".ignore",
                    name: "Data",
                    filename: "Danh sách người dân đã tiêm",
                });
            });
        });
    </script>
</body>

</html>