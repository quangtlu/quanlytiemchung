<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới tài khoản người dùng</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <a href="./index.php?controller=user">
        <i class="fas fa-times close-btn"></i>
    </a>
    <?php 
  if($alert != ''){
      echo 
      "<div class='alert alert-danger' id='success-alert' style='top:100px'>
      <strong>$alert !</strong>
      </div>";
  }
?>
    <div class="container mt-2 animate__animated animate__fadeIn">
        <form method="POST" action="./index.php?controller=user&action=store" class="needs-validation mt-5" novalidate>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label class="form-label" for="hoten">Họ tên</label>
                    <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Họ tên" value=""
                        required>
                    <div class="invalid-feedback">
                        Nhập tên Họ tên
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label" for="cmnd">Số CMND/CCCD</label>
                    <input type="number" class="form-control" id="cmnd" name="cmnd" placeholder="Số CMND/CCCD" value=""
                        required>
                    <div class="invalid-feedback">
                        Nhập số CMND/CCCD
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label" for="ngaysinh">Ngày sinh</label>
                    <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" placeholder="Ngày sinh"
                        value="" required>
                    <div class="invalid-feedback">
                        Nhập ngày sinh
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label class="form-label" for="sdt">Số điện thoại</label>
                    <input type="tel" class="form-control" id="sdt" name="sdt" placeholder="Số điện thoại" value=""
                        required>
                    <div class="invalid-feedback">
                        Nhập tên số điện thoại
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value=""
                        required>
                    <div class="invalid-feedback">
                        Nhập địa chỉ email
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="form-label" for="gioitinh">Giới tính</label>
                    <select name="gioitinh" id="gioitinh" class="form-control">
                        <option value=""></option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    <div class="invalid-feedback">
                        Vui lòng chọn giới tính
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-3">
                    <label for="bhyt" class="form-label">Số thẻ BHYT</label>
                    <input id="bhyt" name="bhyt" type="text" placeholder="Số thẻ BHYT" class="form-control">
                </div>
                <div class=" col-md-3">
                    <label for="quoctich" class="form-label">Quốc tịch</label>
                    <input id="quoctich" name="quoctich" type="text" placeholder="Quốc tịch" class="form-control">
                </div>
                <div class=" col-md-3">
                    <label for="nghenghiep" class="form-label">Nghề nghiệp</label>
                    <input id="nghenghiep" name="nghenghiep" type="text" placeholder="Nghề nghiệp" class="form-control">
                </div>
                <div class=" col-md-3">
                    <label for="dantoc" class="form-label">Dân tộc</label>
                    <input id="dantoc" name="dantoc" type="text" placeholder="Dân tộc" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label class="form-label" for="">Địa chỉ</label>
                    <input type="text" class="form-control" id="" name="diachi" placeholder="Địa chỉ" value="" required>
                    <div class="invalid-feedback">
                        Nhập Địa chỉ
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label" for="tennhomquyen">Tên nhóm quyền</label>
                    <select name="tennhomquyen" class="form-control" id="tennhomquyen">
                        <?php 
              foreach($roles as $item){
                  echo 
                  "<option>${item["TenNhomQuyen"]}</option>";
              }
          ?>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label" for="matkhau">Mật khẩu</label>
                    <input type="password" class="form-control" id="matkhau" name="matkhau" placeholder="Mật khẩu"
                        value="" required>
                    <div class="invalid-feedback">
                        Nhập Mật khẩu
                    </div>
                </div>
            </div>
            <button id="submitBtn" class="btn btn-primary" type="submit">Thêm mới</button>
        </form>
    </div>
    <?php $this->view('frontend.public.footer')?>
    <?php $this->view('frontend.public.js.boostrapJS') ?>

    </script>
</body>

</html>