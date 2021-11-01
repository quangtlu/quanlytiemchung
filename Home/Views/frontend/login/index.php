<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
  
</head>
<body>
    <?php 
        $this->view('frontend.public.headerSite');
        $this->view('frontend.public.base');
    ?>
    <div class="container-fluid">
      <?php 
        if(isset($alert)){
          echo "<div class='alert alert-danger' style='top:100px' id='success-alert'>
          
          <strong>$alert!</strong>
          </div>";
        }
        if(isset($success)){
          echo "<div class='alert alert-success' style='top:100px' id='success-alert'>
          
          <strong>$success!</strong>
          </div>";
        } 
      ?>
      <div class="login-wrap animate__animated animate__fadeInUp">
        <i class="hopital-icon fas fa-hospital-user"></i>
        <form action="./index.php?controller=site&action=login" method="POST" novalidate class="needs-validation">
            <div class="form-row">
              <div class="form-group col-12">
                  <label for="validationCustom01"  class="form-label">Số điện thoại</label>
                  <input id="validationCustom01" name="phone" type="tel" required placeholder="Số điện thoại" class="form-control">
                  <div class="invalid-feedback">
                    Vui lòng nhập số điện thoại
                  </div>
              </div>
          
              <div class="form-group col-12">
                  <label for="password" class="form-label">Mật khẩu</label>
                  <input id="password" name="password" type="password" required placeholder="Mật khẩu" class="form-control">
                  <div class="invalid-feedback">
                    Vui lòng nhập mật khẩu
                  </div>
              </div>
            </div>
            <a href="" class="forgot-password">Quên mật khẩu?</a>
            <button type="submit" class="login-btn border-radius">Đăng nhập</button>
            <div class="offer-register">
              <p>Hoặc đăng ký tài khoản, nếu bạn chưa đăng ký</p>
              <span>Đăng ký</span> 
              <a href="./index.php?controller=site&action=dangky" class="link-to-register">tại đây </a>
            </div>
        </form>
      </div>
  </div>

  <?php $this->view('frontend.public.js.boostrapJS');?>
  <?php $this->view('frontend.public.footer');?>

</body>
</html>
