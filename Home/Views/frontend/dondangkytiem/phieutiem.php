<?php 
    session_start();
    if(!isset($_SESSION['phone'])){
        header("Location: ./index.php?controller=site");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch tiêm chủng</title>
</head>

<body>
    <?php 
        $this->view('frontend.public.headerHome');
        $this->view('frontend.public.base');
    ?>
    <?php if($flag == false){
        echo '<div class="alert alert-danger mt-3 ml-3"  style="width: fit-content;font-size:1.6rem" role="alert">
        Chưa có lịch tiêm. Thử lại sau 
        </div>';
        }
    ?>
    <div class="container"
        style="font-size: 1.4rem; width:fit-content;<?php if($flag == false){echo "display:none";} ?>">
        <div class="card mt-5">
            <div style="font-weight: bold;font-size:1.6rem;color:var(--primary-color)" class="card-header">
                Lịch tiêm chủng vắc-xin covid 19
            </div>
            <ul class="list-group list-group-flush">
                <li class='list-group-item'>Mũi tiêm thứ: <?php echo $dondangkyInfo["MuiTiemThu"] ?> </li>
                <li class='list-group-item'>Tên vắc-xin: <?php echo $vaccineInfo["TenVacxin"] ?> </li>
                <li class='list-group-item'>Ngày tiêm: <?php echo $phieutiemInfo["NgayTiem"] ?> </li>
                <li class='list-group-item'>Giờ tiêm: <?php echo $phieutiemInfo["GioTiem"] ?> </li>
                <li class='list-group-item'>Đơn vị tiêm chủng: <?php echo $donviInfo["TenDonVi"] ?> </li>
                <li class='list-group-item'>Địa điểm tiêm:
                    <?php echo "${donviInfo["XaPhuong"]}, ${donviInfo["QuanHuyen"]}, ${donviInfo["TinhTP"]}, " ?> </li>
            </ul>
        </div>
    </div>
</body>

</html>