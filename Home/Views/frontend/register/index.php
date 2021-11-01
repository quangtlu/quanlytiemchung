<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>

<body>
    <?php 
        $this->view('frontend.public.headerSite');
        $this->view('frontend.public.base');
    ?>
    <div class="container-fluid">
        <div class="container register-modal animate__animated animate__fadeIn">
            <div class="register-content">
                <?php 
                if(isset($alert)){
                    echo "<div class='alert alert-danger' id='success-alert'>
                    
                    <strong>$alert!</strong>
                </div>";
                } 
                
            ?>
                <h3 class="register-content__heading">Đăng ký tài khoản</h3>
                <form action="./index.php?controller=site&action=singup" method="POST" class="needs-validation"
                    novalidate>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Họ và tên<span
                                    class="require">(*)</span></label>
                            <input required id="validationCustom01" name="fullname" type="text" placeholder="Họ và tên"
                                class="form-control">
                            <div class="invalid-feedback">
                                Vui lòng nhập họ và tên
                            </div>
                        </div>

                        <div class=" col-md-4">
                            <label for="validationCustom02" class="form-label">Số CMND/CCCD <span
                                    class="require">(*)</span></label>
                            <input required id="validationCustom02" name="cmnd" type="text"
                                placeholder="Số chứng minh nhân dân/căn cước công dân" class="form-control">
                            <div class="invalid-feedback">
                                Vui lòng nhập số CMND/CCCD
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <label for="phone" class="form-label">Số điện thoại <span class="require">(*)</span></label>
                            <input required id="phone" name="phone" type="tel" placeholder="Số điện thoại"
                                class="form-control">
                            <div class="invalid-feedback">
                                Vui lòng nhập số điện thoại
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-md-4">
                            <label for="email" class="form-label">Email <span class="require">(*)</span></label>
                            <input required id="email" name="email" type="email" placeholder="Email"
                                class="form-control">
                            <div class="invalid-feedback">
                                Vui lòng nhập email
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <label for="dob" class="form-label">Ngày sinh <span class="require">(*)</span></label>
                            <input required id="dob" name="dob" type="date" placeholder="Ngày sinh"
                                class="form-control">
                            <div class="invalid-feedback">
                                Vui lòng nhập ngày sinh
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <label for="gioitinh" class="form-label">Giới tính <span class="require">(*)</span></label>
                            <select required name="gioitinh" id="gioitinh" class="form-control">
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
                            <input id="quoctich" name="quoctich" type="text" placeholder="Quốc tịch"
                                class="form-control">
                        </div>
                        <div class=" col-md-3">
                            <label for="nghenghiep" class="form-label">Nghề nghiệp</label>
                            <input id="nghenghiep" name="nghenghiep" type="text" placeholder="Nghề nghiệp"
                                class="form-control">
                        </div>
                        <div class=" col-md-3">
                            <label for="dantoc" class="form-label">Dân tộc</label>
                            <input id="dantoc" name="dantoc" type="text" placeholder="Dân tộc" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="diachi">Địa chỉ <span class="require">(*)</span></label>
                            <input id="diachi" class="form-control" type="text" required name="diachi"
                                placeholder="Địa chỉ">
                            <div class="invalid-feedback">
                                Vui lòng nhập địa chỉ
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <label for="password" class="form-label">Mật khẩu <span class="require">(*)</span></label>
                            <input required id="password" name="password" type="password" placeholder="Mật khẩu"
                                class="form-control">
                            <div class="invalid-feedback">
                                Vui lòng nhập mật khẩu
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu <span
                                    class="require">(*)</span></label>
                            <input required id="password_confirmation" name="password_confirmation" type="password"
                                placeholder="Nhập lại mật khẩu" class="form-control">
                            <div class="invalid-feedback">
                                Vui lòng nhập lại mật khẩu
                            </div>
                        </div>
                    </div>
                    <div class="button-wrap">
                        <a href="./"><button type="button" class="button cancel-btn">Huỷ bỏ</button></a>
                        <button type="submit" class="form-submit button register-btn">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $this->view('frontend.public.js.boostrapJS');?>
    <?php $this->view('frontend.public.footer');?>

</body>

</html>