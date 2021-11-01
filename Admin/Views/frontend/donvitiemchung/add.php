<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới đơn vị</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <div class="container mt-2 animate__animated animate__fadeIn">
        <a href="./index.php?controller=donvitiemchung">
            <i class="fas fa-times close-btn"></i>
        </a>
        <h2 style="color:blue">Thông tin đơn vị tiêm chủng:</h2>
        <?php 
  if($alert != ''){
    echo 
    "<div class='alert alert-danger' id='success-alert' style='top:100px'>
    <strong>$alert</strong>
    </div>";
  }
?>
        <form method="POST" action="./index.php?controller=donvitiemchung&action=store" class="needs-validation mt-5"
            novalidate>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="province">Tỉnh/Thành Phố</label>
                    <select id="province" class="form-control" name="province"></select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="district">Quận/huyện</label>
                    <select id="district" class="form-control" name="district"></select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="ward">Phường/xã</label>
                    <select id="ward" class="form-control" name="ward"></select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Tên đơn vị</label>
                    <input type="text" class="form-control" id="validationCustom01" name="tendonvi"
                        placeholder="Tên đơn vị tiêm chủng" value="" required>
                    <div class="invalid-feedback">
                        Nhập tên tên đơn vị tiêm chủng
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="quanly">Người đứng đầu</label>
                    <select id="quanly" class="form-control" name="quanly">
                        <?php foreach($users as $item){
                        echo "<option value='${item['ID_NguoiDung']}'>${item['ID_NguoiDung']}. ${item['HoTen']}</option>";
                    } ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Số bàn tiêm</label>
                    <input type="number" class="form-control" id="validationCustom02" name="sobantiem"
                        placeholder="Số bàn tiêm" value="" required>
                    <div class="invalid-feedback">
                        Nhập số bàn tiêm
                    </div>
                </div>
            </div>
            <button id="submitBtn" class="btn btn-primary" type="submit">Thêm mới</button>

        </form>
    </div>
    <?php $this->view('frontend.public.footer')?>
    <?php $this->view('frontend.public.vietnamlocalselectormaster.vietnamlocalselector') ?>
    <?php $this->view('frontend.public.js.boostrapJS') ?>

</body>

</html>