<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu tiêm chủng</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a href="./index.php?controller=phieutiem" style="color: #28a745;font-size:1.6rem; text-transform: uppercase;"
            class="navbar-brand">Danh sách phiếu tiêm chủng vắc-xin Covid 19</a>
        <form class="form-inline" method="post" action="">
            <input class="form-control mr-sm-2" type="search" required name="keyword" placeholder="Nhập số điện thoại"
                aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form>
    </nav>
    <div class="tableFixHead table-responsive">
        <table class="table table-bordered">
            <thead >
                <tr>
                    <th scope="col">Họ Tên</th>
                    <th scope="col">CMND/CCCD</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Triệu chứng sau tiêm</th>
                    <th scope="col">Xác nhận tiêm</th>
                    <th scope="col">Chi tiết</th>
                </tr>
            </thead>
            <tbody class="row-table">

                <?php foreach($result as $item){
                echo "
                    <form action='./index.php?controller=phieutiem&action=duyet&id=${item["ID_NguoiDung"]}' method = 'POST'> 
                        <tr>
                            <td> ${item["HoTen"]} </td>
                            <td> ${item["CMND"]} </td>
                            <td> ${item["GioiTinh"]} </td>
                            <td> ${item["NgaySinh"]} </td>
                            <td> ${item["SDT"]} </td>
                            <td> ${item["Email"]} </td>
                            <td> 
                                <input type='text' name='trieuchung' class='form-control' required list='trieuchungs'>
                                <datalist id='trieuchungs'>
                                    <option value='Không'>Không</option>
                                    <option value='Mệt mỏi'>Mệt mỏi</option>
                                    <option value='Đau đầu'>Đau đầu</option>
                                    <option value='Đau cơ'>Đau cơ</option>
                                    <option value='Ớn lạnh'>Ớn lạnh</option>
                                    <option value='Sốt'>Sốt</option>
                                    <option value='Buồn nôn'>Buồn nôn</option>
                                </datalist>
                            </td>
                            <td><button style='background-color:#fff' type='submit'><i class='check-btn far fa-check-circle'></i></button></td>
                            <td><a href='./index.php?controller=phieutiem&action=chitiet&id=${item["ID_NguoiDung"]}'><i class='editBtn far fa-eye'></i></a></td>
                      </tr>
                    </form> 
                      ";
            } ?>
            </tbody>
        </table>
    </div>
    <?php $this->view('frontend.public.footer') ?>
</body>

</html>