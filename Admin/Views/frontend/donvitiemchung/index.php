<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn vị tiêm chủng</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <div class="tableFixHead table-responsive">
        <table class="table table-bordered">
            <thead >
                <tr>
                    <th scope="col">Tên đơn vị</th>
                    <th scope="col">Người đứng đầu</th>
                    <th scope="col">Số bàn tiêm</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody class="row-table">
                <?php 
                for($i = 0; $i<count($donvis);$i++){
                    echo 
                    "<tr class='row-content'>
                        <td>".$donvis[$i]["TenDonVi"]."</td>
                        <td>".$nguoidungdaus[$i]["HoTen"]."</td>
                        <td>".$donvis[$i]["SoBanTiem"]."</td>
                        <td>".$donvis[$i]["XaPhuong"]." - ".$donvis[$i]["QuanHuyen"]." - ".$donvis[$i]["TinhTP"]." </td>
                        <td><a href='./index.php?controller=donvitiemchung&action=suadonvi&id=".$donvis[$i]["ID_DonVi"]."'><i class='editBtn fas fa-edit'></i></a></td>
                        <td><a href='./index.php?controller=donvitiemchung&action=delete&id=".$donvis[$i]["ID_DonVi"]."'><i class='removeBtn fas fa-trash-alt'></i></a></td>
                    </tr>";
                }
            ?>
            </tbody>
        </table>
        <a href="./index.php?controller=donvitiemchung&action=themdonvi">
            <button type="button" class="mt-2 btn createBtn btn-primary">Thêm mới</button>
        </a>
    </div>
    <?php $this->view('frontend.public.footer') ?>
</body>

</html>