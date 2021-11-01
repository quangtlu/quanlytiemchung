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
    <title>Hồ sơ tiêm chủng</title>
</head>

<body>
    <?php 
        $this->view('frontend.public.headerHome');
        $this->view('frontend.public.base');
    ?>
    <?php if(!$dondangkys){
        echo '<div class="alert alert-danger mt-3 ml-3"  style="width: fit-content;font-size:1.6rem" role="alert">
        Chưa có hồ sơ tiêm chủng. Thử lại sau 
        </div>';
        }
    ?>
    <div class="container" style="font-size: 1.4rem; width:fit-content;<?php if(!$dondangkys){echo "display:none";} ?>">
        <h3 class="mt-5" style="color: var(--primary-color);">Hồ sơ tiêm chủng:</h3>
        <table class="table table-bordered mt-5 animate__animated animate__fadeInUp" style="text-align: center;">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Mũi tiêm thứ</th>
                    <th scope="col">Ngày tiêm</th>
                    <th scope="col">Giờ tiêm</th>
                    <th scope="col">Địa điểm tiêm</th>
                    <th scope="col">Tên Vắc-xin</th>
                    <th scope="col">Triệu chứng sau tiêm</th>
                </tr>
            </thead>
            <tbody class="row-table">
                <?php 
            for($i = 0; $i<count($dondangkys); $i++){
                echo "<tr class='row-content'>
                        <td>".$dondangkys[$i]['MuiTiemThu']."</td>
                        <td>".$phieutiems[$i]['NgayTiem']."</td>
                        <td>".$phieutiems[$i]['GioTiem']."</td>
                        <td>".$dondangkys[$i]['XaPhuong']." - ".$dondangkys[$i]['QuanHuyen']." - ".$dondangkys[$i]['TinhTP']."</td>
                        <td>".$vaccines[$i]['TenVacxin']."</td>
                        <td>".$chitiets[$i]['TrieuChung']."</td>
                     </tr>
                     ";
            }
            
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>