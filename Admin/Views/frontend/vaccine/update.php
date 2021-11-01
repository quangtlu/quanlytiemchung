<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin vắc-xin</title>
    <?php $this->view('frontend.public.base')?>

</head>
<body>
<?php $this->view('frontend.public.header')?>
<a href="./index.php?controller=vaccine">
    <i class="fas fa-times close-btn"></i>
</a>
<div class="container mt-5 animate__animated animate__fadeIn">
    <div class="wrap-title-icon">
        <h4 class="head-title">Thông tin Vắc-xin covid 19</h4>
        <i class="sidebar-icon fas fa-syringe"></i> 
    </div>
        <?php  
            if($alert != ''){
                echo 
                "<div class='alert alert-danger' id='success-alert' style='top:100px'>
                
                <strong>$alert !</strong>
                </div>";
            }
        ?>        
        <form method="POST" action="./index.php?controller=vaccine&action=update&id=<?php echo $vaccines["ID_Vacxin"]?>" class="needs-validation mt-5" novalidate>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Tên vaccine</label>
                    <input type="text" class="form-control" id="validationCustom01" name="tenVacine" placeholder="Tên vaccine" value="<?php echo $vaccines["TenVacxin"]; ?>" required>
                    <div class="invalid-feedback">
                        Nhập tên vaccine
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="validationCustom02">Hãng sản xuất</label>
                <input type="text" class="form-control" id="validationCustom02" name="hsx" placeholder="Tên hãng sản xuất" value="<?php echo $vaccines["HangSanXuat"]; ?>" required>
                <div class="invalid-feedback">
                    Nhập tên hãng sản xuất
                </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="validationCustomUsername">Quuốc gia</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="validationCustomUsername" name="quocGia" placeholder="Quốc gia" value="<?php echo $vaccines["QuocGia"]; ?>" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                    Nhập tên quốc gia
                    </div>
                </div>
                </div>
            </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">Loại vaccine</label>
                <select class="form-control" id="validationCustom03"  name="loaiVaccine" placeholder="Loại vaccine" required>
                    <option selected value="<?php echo $vaccines["LoaiVacxin"]; ?>"><?php echo $vaccines["LoaiVacxin"]; ?></option>
                    <option value="Vắc xin protein tái tổ hợp">Protein tái tổ hợp</option>
                    <option value="Vector virus">Vector virus</option>
                    <option value="mRNA">mRNA</option>
                    <option value="Vắc xin “protein dạng mảnh">Vắc xin “protein dạng mảnh</option>
                    <option value="Vắc xin bất hoạt">Vắc xin bất hoạt</option>
                </select>
                <div class="invalid-feedback">
                    Chọn loại vaccine
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom04">Đối tượng tiêm</label>
                <select id="validationCustom04" name="age" class="form-control"  required>
                    <option value="<?php echo $vaccines["DoiTuong"]; ?>"><?php echo $vaccines["DoiTuong"]; ?></option>
                    <option value="12 - 15 tuổi">12 - 15 tuổi</option>
                    <option  value="18 tuổi trở lên">18 tuổi trở lên</option>
                </select>
                <div class="invalid-feedback">
                    Chọn độ tuổi phù hợp
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">Số mũi tiêm</label>
                <input type="number" class="form-control" id="validationCustom03" name="soMui" value="<?php echo $vaccines["SoMui"]; ?>" placeholder="Nhập số mũi tiêm" required>
                <div class="invalid-feedback">
                    Nhập số mũi tiêm
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">Khoảng cách giữa 2 mũi</label>
                <input type="number" class="form-control" id="validationCustom03" name="khoangCach" value="<?php echo $vaccines["KhoangCach"]; ?>" placeholder="Nhập số ngày" required>
                <div class="invalid-feedback">
                    Nhập khoảng cách giữa 2 mũi tiêm
                </div>
            </div>
            <button id="submitBtn" class="btn btn-primary" type="submit">Cập nhật</button>
        </form>
</div>
<?php $this->view('frontend.public.footer')?>
<?php $this->view('frontend.public.js.boostrapJS') ?>
</body>
</html>