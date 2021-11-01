<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin tài khoản người dùng</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <a href="./index.php?controller=user">
        <i class="fas fa-times close-btn"></i>
    </a>
    <div class="container mt-5 animate__animated animate__fadeIn">
        <?php 
    if($alert != ''){
        echo 
        "<div class='alert alert-danger' id='success-alert' style='top:100px'>
        <strong>$alert !</strong>
        </div>";
    }
?>
        <form method="POST" action="./index.php?controller=user&action=update&id=<?php echo $id?>"
            class="needs-validation mt-5" novalidate>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label for="">Họ tên</label>
                    <input type="text" class="form-control" value="<?php echo $users["HoTen"]; ?>" id="" name="hoten"
                        placeholder="Họ tên" value="" required>
                    <div class="invalid-feedback">
                        Nhập tên Họ tên
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="">Số CMND/CCCD</label>
                    <input type="number" class="form-control" value="<?php echo $users["CMND"]; ?>" id="" name="cmnd"
                        placeholder="Số CMND/CCCD" value="" required>
                    <div class="invalid-feedback">
                        Nhập số CMND/CCCD
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="">Ngày sinh</label>
                    <input type="date" class="form-control" value="<?php echo $users["NgaySinh"]; ?>" id=""
                        name="ngaysinh" placeholder="Ngày sinh" value="" required>
                    <div class="invalid-feedback">
                        Nhập ngày sinh
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label for="">Số điện thoại</label>
                    <input type="tel" class="form-control" value="<?php echo $users["SDT"]; ?>" id="" name="sdt"
                        placeholder="Số điện thoại" value="" required>
                    <div class="invalid-feedback">
                        Nhập tên số điện thoại
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="">Email</label>
                    <input type="email" class="form-control" value="<?php echo $users["Email"]; ?>" id="" name="email"
                        placeholder="Email" value="" required>
                    <div class="invalid-feedback">
                        Nhập địa chỉ email
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" value="<?php echo $users["DiaChi"]; ?>" name="diachi"
                        placeholder="Địa chỉ" required>
                    <div class="invalid-feedback">
                        Nhập Địa chỉ
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-3">
                    <label for="bhyt" class="form-label">Số thẻ BHYT</label>
                    <input id="bhyt" value="<?php echo $users["BHYT"]; ?>" name="bhyt" type="text"
                        placeholder="Số thẻ BHYT" class="form-control">
                </div>
                <div class=" col-md-3">
                    <label for="quoctich" class="form-label">Quốc tịch</label>
                    <input id="quoctich" value="<?php echo $users["QuocTich"]; ?>" name="quoctich" type="text"
                        placeholder="Quốc tịch" class="form-control">
                </div>
                <div class=" col-md-3">
                    <label for="nghenghiep" class="form-label">Nghề nghiệp</label>
                    <input id="nghenghiep" value="<?php echo $users["NgheNghiep"]; ?>" name="nghenghiep" type="text"
                        placeholder="Nghề nghiệp" class="form-control">
                </div>
                <div class=" col-md-3">
                    <label for="dantoc" class="form-label">Dân tộc</label>
                    <input id="dantoc" value="<?php echo $users["DanToc"]; ?>" name="dantoc" type="text"
                        placeholder="Dân tộc" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class=" col-md-4">
                    <label for="gioitinh">Giới tính</label>
                    <select name="gioitinh" id="gioitinh" class="form-control">
                        <option value="<?php echo $users["GioiTinh"] ?>"><?php echo $users["GioiTinh"] ?></option>
                        <?php 
                        if($users["GioiTinh"] == "Nam"){
                          echo "<option value='Nữ'>Nữ</option>";
                        }
                        else{
                          echo "<option value='Nam'>Nam</option>";

                        }
                    ?>
                    </select>
                    <div class="invalid-feedback">
                        Vui lòng chọn giới tính
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="">Tên nhóm quyền</label>
                    <select name="tennhomquyen" class="form-control" id="">
                        <?php 
                    foreach($roles as $item){
                        echo 
                        "<option>${item["TenNhomQuyen"]}</option>";
                    }
                ?>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="">Mật khẩu</label>
                    <input type="text" class="form-control" value="<?php echo $users["MatKhau"]; ?>" id=""
                        name="matkhau" placeholder="Mật khẩu" value="" required>
                    <div class="invalid-feedback">
                        Nhập Mật khẩu
                    </div>
                </div>
            </div>
            <button id="submitBtn" class="btn btn-primary" type="submit">Cập nhật</button>

        </form>
    </div>
    <?php $this->view('frontend.public.footer')?>
    <?php $this->view('frontend.public.js.boostrapJS') ?>


</body>

</html>