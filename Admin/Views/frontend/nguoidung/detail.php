<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết thông tin người dùng</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <a href="./index.php?controller=user">
        <i class="fas fa-times close-btn"></i>
    </a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Thông tin cá nhân
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php 
                        echo "<li class='list-group-item'> Họ tên: ${users['HoTen']}</li>
                            <li class='list-group-item'> CMND: ${users['CMND']}</li>
                            <li class='list-group-item'> Giới tính: ${users['GioiTinh']}</li>
                            <li class='list-group-item'> Ngày sinh: ${users['NgaySinh']}</li>
                            <li class='list-group-item'> Địa chỉ: ${users['DiaChi']}</li>
                            <li class='list-group-item'> Email: ${users['Email']}</li>
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
                        Thông tin tài khoản
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php 
                        echo "<li class='list-group-item'> Tài khoản: ${users['SDT']}</li>
                            <li class='list-group-item'> Mật khẩu: ${users['MatKhau']} </li>
                            <li class='list-group-item'> Nhóm quyền: ${roles['TenNhomQuyen']} </li>
                        ";
                        ?>
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