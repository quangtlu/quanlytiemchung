<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <?php 
    if($success != ''){
        echo 
        "<div class='alert alert-success' id='success-alert' style='top:100px'>
        
        <strong>$success !</strong>
        </div>";
    }
?>
    <div class="tableFixHead table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Tên vắc-xin</th>
                    <th scope="col">Hãng sản xuất</th>
                    <th scope="col">Quốc gia</th>
                    <th scope="col">Loại vắc-xin</th>
                    <th scope="col">Đối tượng tiêm</th>
                    <th scope="col">Số mũi tiêm</th>
                    <th scope="col">Khoảng cách giữa 2 mũi</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody class="row-table">
                <?php 
                foreach($vaccines as $item){
                    echo 
                    "<tr class='row-content'>
                        <td>${item["TenVacxin"]}</td>
                        <td>${item["HangSanXuat"]}</td>
                        <td>${item["QuocGia"]}</td>
                        <td>${item["LoaiVacxin"]}</td>
                        <td>${item["DoiTuong"]}</td>
                        <td>${item["SoMui"]}</td>
                        <td>${item["KhoangCach"]} ngày</td>
                        <td><a href='./index.php?controller=vaccine&action=suavacxin&id=${item["ID_Vacxin"]}'><i class='editBtn fas fa-edit'></i></a></td>
                        <td><a href='./index.php?controller=vaccine&action=delete&id=${item["ID_Vacxin"]}'><i class='removeBtn fas fa-trash-alt'></i></a></td>
                    </tr>";
                }
            ?>
            </tbody>
        </table>
        <a href="./index.php?controller=vaccine&action=themvacxin" class="createBtn">
            <button type="button" class="btn  btn-primary">Thêm mới</button>
        </a>
    </div>

    <?php $this->view('frontend.public.footer') ?>
    <?php $this->view('frontend.public.js.boostrapJS') ?>

</body>

</html>