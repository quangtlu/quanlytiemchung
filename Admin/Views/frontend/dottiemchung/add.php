<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: ./index.php?controller=login");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới đợt tiêm chủng</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>

    <?php 
  if($alert != ''){
      echo 
      "<div class='alert alert-danger' id='success-alert' style='top:100px'>
      <strong>$alert !</strong>
      </div>";
  }
?>
    <a href="./index.php?controller=dottiemchung">
        <i class="fas fa-times close-btn"></i>
    </a>
    <div class="container mt-3 animate__animated animate__fadeIn">
        <form method="POST" action="./index.php?controller=dottiemchung&action=store&phone=<?php echo $_SESSION["admin"] ?>"
            class="needs-validation mt-5" novalidate>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label for="tendot">Tên đợt tiêm chủng</label>
                    <input type="text" class="form-control" id="tendot" name="tendot" placeholder="Tên đợt tiêm chủng"
                        value="" required>
                    <div class="invalid-feedback">
                        Nhập tên đợt tiêm chủng
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="ngaybd">Ngày bắt đầu</label>
                    <input type="date" class="form-control" id="ngaybd" name="ngaybd" placeholder="Ngày bắt đầu"
                        value="" required>
                    <div class="invalid-feedback">
                        Nhập Ngày bắt đầu
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="ngaykt">Ngày kết thúc</label>
                    <input type="date" class="form-control" id="ngaykt" name="ngaykt" placeholder="Ngày kết thúc"
                        value="" required>
                    <div class="invalid-feedback">
                        Nhập Ngày kết thúc
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label for="tenvacxin">Tên vắc xin</label>
                    <select required name="tenvacxin" id="tenvacxin" class="form-control">
                        <option value=""></option>
                        <?php 
              foreach($vaccines as $item1){
                echo "<option value='${item1["TenVacxin"]}'>${item1["TenVacxin"]}</option>";
              };
            ?>
                    </select>
                    <div class="invalid-feedback">
                        Chọn vắc xin
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="soluong">Số lượng người được tiêm</label>
                    <input type="number" class="form-control" id="" name="soluong" placeholder="Số lượng" value=""
                        required>
                    <div class="invalid-feedback">
                        Nhập số lượng người dự kiến tiêm
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