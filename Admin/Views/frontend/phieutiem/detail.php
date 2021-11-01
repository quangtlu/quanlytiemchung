<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết phiếu tiêm</title>
    <?php $this->view('frontend.public.base')?>

</head>
<body>
<?php $this->view('frontend.public.header')?>
<a href="./index.php?controller=phieutiem">
    <i class="fas fa-times close-btn"></i>
</a>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                    Thông tin cá nhân
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php 
                        echo "<li class='list-group-item'> Đối tượng ưu tiên: ${dondangkys['NhomUuTien']}</li>
                            <li class='list-group-item'> Tiền sử bệnh: ${dondangkys['TienSuBenh']}</li>
                            <li class='list-group-item'> Địa chỉ: ${users['DiaChi']}</li>  
                            <li class='list-group-item'> Quốc tịch: ${users['QuocTich']} </li>
                            <li class='list-group-item'> Dân tộc: ${users['DanToc']} </li>
                            <li class='list-group-item'> Nghề nghiệp: ${users['NgheNghiep']} </li>
                            <li class='list-group-item'> Số thẻ BHYT: ${users['BHYT']} </li>
                        ";
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                    Thông tin phiếu tiêm
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php 
                        echo "
                        <li class='list-group-item'> Mã phiếu: ${phieutiems['ID_phieu']} </li>
                        <li class='list-group-item'> Mũi tiêm thứ: ${dondangkys['MuiTiemThu']} </li>
                        <li class='list-group-item'> Tên vắc-xin: ${vaccines['TenVacxin']} </li>
                        <li class='list-group-item'> Ngày tiêm: ${phieutiems['NgayTiem']} </li>
                        <li class='list-group-item'> Giờ tiêm: ${phieutiems['GioTiem']} </li>
                        <li class='list-group-item'> Đơn vị tiêm chủng: ${donvis['TenDonVi']} </li>
                        <li class='list-group-item'> Địa điểm: ${donvis['XaPhuong']}, ${donvis['QuanHuyen']}, ${donvis['TinhTP']} </li>
                        ";
                        
                        ?>
                        <li class='list-group-item'>Trạng thái: 
                            <?php 
                                if($phieutiems["TrangThai"] == 0){
                                    echo "<b style='color:red'> Chưa tiêm </b>";
                                }
                                else{
                                    echo "<b style='color:green'> Đã tiêm </b>";
                                } 
                            ?> 
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php $this->view('frontend.public.template.plugins.chartmin')?>
<?php $this->view('frontend.public.template.plugins.feathermin')?>
<?php $this->view('frontend.public.template.js.script')?>


</body>
</html>