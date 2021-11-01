<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn đợt tiêm chủng</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <a href="./index.php?controller=dottiemchung">
        <i class="fas fa-times close-btn"></i>
    </a>
    <div class="container-fluid">
        <div class="card mt-5">
            <div class="card-header">
                Thông tin đợt tiêm chủng
            </div>
            <ul class="list-group list-group-flush">
                <?php 
                echo "
                    <li class='list-group-item'> Đơn vị tiêm chủng: ${donvis['TenDonVi']}</li>
                    <li class='list-group-item'> Tên đợt: ${dottiemchungs['TenDotTC']}</li>
                    <li class='list-group-item'> Tên vắc-xin: ${vaccines['TenVacxin']}</li>
                    <li class='list-group-item'> Số lượng: ${dottiemchungs['SoLuong']}</li>
                    <li class='list-group-item'> Ngày bắt đầu: ${dottiemchungs['NgayBD']}</li>
                    <li class='list-group-item'> Ngày kết thúc: ${dottiemchungs['NgayKT']}</li>
                ";
                ?>
            </ul>
        </div>

    </div>
    <?php $this->view('frontend.public.template.plugins.chartmin')?>
    <?php $this->view('frontend.public.template.plugins.feathermin')?>
    <?php $this->view('frontend.public.template.js.script')?>

</body>

</html>