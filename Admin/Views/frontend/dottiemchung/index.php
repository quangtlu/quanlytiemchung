<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đợt tiêm chủng</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <div class="tableFixHead table-responsive">
        <table class="table table-bordered">
            <thead >
                <tr>
                    <th scope="col">Đợt tiêm</th>
                    <th scope="col">Tên Vắc-xin</th>
                    <th scope="col">Ngày bắt đầu</th>
                    <th scope="col">Ngày kết thúc</th>
                    <th scope="col">Số lượng người</th>
                    <th scope="col">Xem</th>
                    <th scope="col">sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody class="row-table">
                <?php 
                for($i = 0; $i<count($dottiems);$i++){
                    echo "<tr class='row-content'>
                        <td>".$dottiems[$i]["TenDotTC"]."</td>
                        <td>".$vaccines[$i]["TenVacxin"]."</td>
                        <td>".$dottiems[$i]["NgayBD"]."</td>
                        <td>".$dottiems[$i]["NgayKT"]."</td>
                        <td>".$dottiems[$i]["SoLuong"]."</td>
                        <td><a href='./index.php?controller=dottiemchung&action=chitiet&id=".$dottiems[$i]["ID_DotTC"]."'><i class='editBtn far fa-eye'></i></a></td>
                        <td><a href='./index.php?controller=dottiemchung&action=edit&id=".$dottiems[$i]["ID_DotTC"]."'><i class='editBtn fas fa-edit'></i></a></td>
                        <td><a href='./index.php?controller=dottiemchung&action=delete&id=".$dottiems[$i]["ID_DotTC"]."'><i class='removeBtn fas fa-trash-alt'></i></a></td>
                    </tr>";
                }
            ?>
            </tbody>
        </table>
        <a href='./index.php?controller=dottiemchung&action=themmoi&phone=<?php echo $_SESSION["admin"]?>'>
            <button type="button" class="mt-2 btn createBtn btn-primary">Thêm mới</button>
        </a>
    </div>
    <?php $this->view('frontend.public.footer') ?>
</body>

</html>