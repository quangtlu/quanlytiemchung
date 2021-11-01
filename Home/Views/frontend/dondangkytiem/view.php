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
    <title>Đơn đăng ký tiêm</title>
</head>

<body>
    <?php 
        $this->view('frontend.public.headerHome');
        $this->view('frontend.public.base');
    ?>
    <?php if($dondangkyInfo == null ){
        echo '<div class="alert alert-danger mt-3"  style="width: fit-content;font-size:1.6rem" role="alert">
        Bạn chưa đăng ký tiêm vắc-xin <a href="./index.php?controller=dondangkytiem" class="alert-link">Đăng ký ngay</a>. 
        </div>';
        }
    ?>
    <div class="container"
        style="font-size: 1.4rem; width:fit-content;<?php if($dondangkyInfo == null){echo "display:none";} ?>">
        <div class="card mt-5">
            <div style="font-weight: bold;font-size:1.6rem;color:var(--primary-color)" class="card-header">
                Thông tin đơn đăng ký
            </div>
            <ul class="list-group list-group-flush">
                <li class='list-group-item'> Mũi tiêm thứ: <?php echo $dondangkyInfo["MuiTiemThu"] ?> </li>
                <li class='list-group-item'>Địa chỉ hiện tại:
                    <?php echo "".$dondangkyInfo["XaPhuong"].", ".$dondangkyInfo["QuanHuyen"].", ".$dondangkyInfo["TinhTP"]."" ?>
                </li>
                <li class='list-group-item'>Nhóm ưu tiên: <?php echo $dondangkyInfo["NhomUuTien"] ?> </li>
                <li class='list-group-item'>Tiền sử bệnh: <?php echo $dondangkyInfo["TienSuBenh"] ?> </li>
                <li class='list-group-item'>Ngày muốn được tiêm: <?php echo $dondangkyInfo["NgayMongMuon"] ?> </li>
                <li class='list-group-item'>Ngày đăng ký: <?php echo $dondangkyInfo["NgayDK"] ?> </li>
                <li class='list-group-item'>Trạng thái đơn đăng ký:
                    <?php 
                        if($dondangkyInfo["TrangThai"] == 0){
                            echo "<b style='color:red'> Đang chờ xét duyệt </b>";
                        }
                        else{
                            echo "<b style='color:green'> Đã được xét duyệt </b>";
                        } 
                    ?>
                </li>
            </ul>
        </div>
        <div class="mt-3">
            <a
                <?php if($dondangkyInfo["TrangThai"] == 0){echo "href='./index.php?controller=dondangkytiem&action=delete&phone=${_SESSION['phone']}'";}?>>
                <button type="button" <?php if($dondangkyInfo["TrangThai"] != 0){echo "disabled";}?>
                    style="font-size: 1.4rem;" class="btn btn-danger">Hủy đơn</button>
            </a>
            <a
                <?php if($dondangkyInfo["TrangThai"] == 0){echo "href='./index.php?controller=dondangkytiem&action=suathongtin&phone=${_SESSION['phone']}'";}?>>
                <button type="button" <?php if($dondangkyInfo["TrangThai"] != 0){echo "disabled";}?>
                    style="font-size: 1.4rem;" class="btn btn-info">Sửa thông tin</button>
            </a>
            <?php 
              if($dondangkyInfo["TrangThai"] == 1)
                echo '<div class="alert alert-danger mt-3" style="text-align:center" role="alert">
                Không thể hủy hay chỉnh sửa đơn đã được xét duyệt!
              </div>';
              if($dondangkyInfo["TrangThai"] == 2){
                echo "<div class='alert alert-success mt-3'  style='width: fit-content;font-size:1.6rem' role='alert'>
                Đã có lịch tiêm chủng<a href='./index.php?controller=dondangkytiem&action=lichtiem&phone=${_SESSION["phone"]}' class='alert-link'> Xem ngay</a>. 
                </div>";
              }
           ?>
        </div>
    </div>
    <?php $this->view('frontend.public.js.boostrapJS');?>
</body>

</html>