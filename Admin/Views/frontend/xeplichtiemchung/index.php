<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xếp lịch tiêm</title>
    <?php $this->view('frontend.public.base')?>
    <style>
    .modal-layout {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 999999;
        background-color: rgba(0, 0, 0, 0.25);
        display: none;
    }

    .dottiem {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: fit-content;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        border: 1px solid rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
        box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding-box;
        background-clip: padding-box;
    }
    </style>
</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <?php  
    if(isset($alert) && $alert !=""){
        echo "<div style='font-size:12px;width:30%;right:250px;top: 16px;z-index:10;position:absolute;' 
        class='alert alert-danger mt-4 animate__animated animate__fadeInRight' role='alert'>$alert</div>";
    }
?>
    <div class="tableFixHead table-responsive">
        <form action="./index.php?controller=xeplichtiemchung&action=xeplich" method="POST">
            <table class="table table-bordered">
                <thead >
                    <tr>
                        <th scope="col">Mũi tiêm thứ</th>
                        <th scope="col">Đối tượng ưu tiên</th>
                        <th scope="col">Tiền sử bệnh</th>
                        <th scope="col">Ngày đăng ký</th>
                        <th scope="col">Ngày muốn tiêm</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">
                            <button type="button" class="btn1 btn btn-success btn-sm">Chọn tất cả</button>
                            <button type="button" style="display:none" class="btn2 btn btn-danger btn-sm">Bỏ
                                chọn</button>
                        </th>
                    </tr>
                </thead>
                <tbody class="row-table">
                    <?php 
                foreach($dondangkys as $item){
                    if($item["TrangThai"] == 1){
                        echo 
                        "<tr class='row-content'>
                            <td>${item["MuiTiemThu"]}</td>
                            <td>${item["NhomUuTien"]}</td>";
                        if($item["TienSuBenh"] == null){
                            echo "<td>Không</td>";
                        }
                        else{
                            echo "<td>${item["TienSuBenh"]}</td>";
                        }
                        echo "<td>${item["NgayDK"]}</td>
                            <td>${item["NgayMongMuon"]}</td>
                            <td style='color:green;font-weight:bold'> Đã duyệt </td>
                            <td><input type='checkbox' class='dondangkys' name='dondangky[]' value='${item["ID_DonDK"]}'></td>
                            </tr>";
                        
                        
                    }
                }
            ?>
                </tbody>
            </table>
            <div class="modal-layout">
                <div class="dottiem animate__animated animate__fadeIn">
                    <table id="" class="table table-bordered">
                        <thead >
                            <tr>
                                <th scope="col">Đợt tiêm</th>
                                <th scope="col">Vắc-xin</th>
                                <th scope="col">Bắt đầu</th>
                                <th scope="col">Kết thúc</th>
                                <th scope="col">Số lượng người</th>
                                <th scope="col">Ngày tiêm</th>
                                <th scope="col">Giờ tiêm</th>
                                <th scope="col">Chọn</th>
                            </tr>
                        </thead>
                        <tbody class="row-table">
                            <?php 
                            for($i = 0; $i<count($dottiems);$i++){
                                echo "<tr class='row-content'>
                                    <td>".$dottiems[$i]["TenDotTC"]."</td>
                                    <td>".$vaccines[$i]["TenVacxin"]."</td>
                                    <td>".$dottiems[$i]["NgayBD"]."</td>
                                    <td>".$dottiems[$i]["NgayKT"]."</td>
                                    <td>".$dottiems[$i]["SoLuong"]."</td>
                                        <td><input type='date' class='form-control' name='ngaytiem[]' placeholder='Ngày tiêm'></td>
                                        <td><select name='giotiem[]'>
                                                <option value=''></option>
                                                <option value='8h00:9h00'>8h00:9h00</option>
                                                <option value='9h00:10h00'>9h00:10h00 </option>
                                                <option value='10h00:11h00'>10h00:11h00</option>
                                                <option value='11h00:12h00'>11h00:12h00</option>
                                                <option value='13h00:14h00'>13h00:14h00</option>
                                                <option value='14h00:15h00'>14h00:15h00</option>
                                                <option value='15h00:16h00'>15h00:16h00</option>
                                                <option value='16h00:17h00'>16h00:17h00</option>
                                            </select>
                                        </td>
                                        <td><input class='form-control' type='radio' name='dottiem' value='".$dottiems[$i]["ID_DotTC"]."'></td>
                                    </tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                    <button id="cancel" type="button" class="btn btn-danger">Hủy</button>

                </div>

            </div>
            <button id="xeplich" type="button" class="ml-3 btn btn-primary">Xếp lịch</button>
            <a href="./index.php?controller=phieutiem"><button type="button" class="ml-2 btn btn-outline-success">Cập nhật hồ sơ</button></a>
        </form>
    </div>

    <?php $this->view('frontend.public.footer') ?>
    <script>
    document.querySelector("#xeplich").onclick = function() {
        document.querySelector(".modal-layout").style.display = "block";
    }
    document.querySelector("#cancel").onclick = function() {
        document.querySelector(".modal-layout").style.display = "none";
    }

    // Chức năng chọn hết
    document.querySelector(".btn1").onclick = function() {
        document.querySelector(".btn2").style.display = "block";
        document.querySelector(".btn1").style.display = "none";

        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('dondangky[]');

        // Lặp và thiết lập checked
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = true;
        }
    };

    // Chức năng bỏ chọn hết
    document.querySelector(".btn2").onclick = function() {
        document.querySelector(".btn1").style.display = "block";
        document.querySelector(".btn2").style.display = "none";
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('dondangky[]');

        // Lặp và thiết lập Uncheck
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
    };
    </script>
</body>

</html>