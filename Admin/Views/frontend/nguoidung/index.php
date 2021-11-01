<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản người dùng</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <div class="tableFixHead table-responsive">
        <table class="table table-bordered">
            <thead >
                <tr>
                    <th scope="col">Họ tên</th>
                    <th scope="col">CMND/CCCD</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Nhóm quyền</th>
                    <th scope="col">Xem</th>
                    <th scope="col">sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody class="row-table">
                <?php 
                for($i=0;$i<count($users);$i++){
                    echo 
                    "
                        <td>".$users[$i]["HoTen"]."</td>
                        <td>".$users[$i]["CMND"]."</td>
                        <td>".$users[$i]["NgaySinh"]."</td>
                        <td>".$users[$i]["GioiTinh"]."</td>
                        <td>".$users[$i]["SDT"]."</td>
                        <td>".$roles[$i]["TenNhomQuyen"]."</td>
                        <td><a href='./index.php?controller=user&action=chitiet&id=".$users[$i]["ID_NguoiDung"]."'><i class='editBtn far fa-eye'></i></a></td>
                        <td><a href='./index.php?controller=user&action=edituser&id=".$users[$i]["ID_NguoiDung"]."'><i class='editBtn fas fa-edit'></i></a></td>
                        <td><a href='./index.php?controller=user&action=delete&id=".$users[$i]["ID_NguoiDung"]."'><i class='removeBtn fas fa-trash-alt'></i></a></td>
                    </tr>";
                }
            ?>
            </tbody>
        </table>
        <a href="./index.php?controller=user&action=adduser">
            <button type="button" class="mt-2 btn createBtn btn-primary">Thêm mới</button>
        </a>
    </div>
    <?php $this->view('frontend.public.footer') ?>
</body>

</html>