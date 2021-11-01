<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn đăng ký tiêm chủng</title>
    <?php $this->view('frontend.public.base')?>

</head>

<body>
    <?php $this->view('frontend.public.header')?>
    <?php 
  if(isset($alert) && $alert != ''){
    echo 
    "<div class='alert alert-danger' id='success-alert' style='top:100px'>
    <strong>$alert</strong>
    </div>";
  }
  if(isset($success) && $success != ''){
    echo 
    "<div class='alert alert-success' id='success-alert' style='top:100px'>
    <strong>$success</strong>
    </div>";
  }
?>
    <div class="tableFixHead table-responsive">
        <form action="./index.php?controller=dondangky&action=selectAll" method="post">
            <table class="table table-bordered">
                <thead >
                    <tr>
                        <th scope="col">
                            <button type="button" class="btn1 btn btn-success btn-sm">Chọn tất cả</button>
                            <button type="button" style="display:none" class="btn2 btn btn-danger btn-sm">Bỏ
                                chọn</button>
                        </th>
                        <th scope="col">Mũi tiêm thứ</th>
                        <th scope="col">Đối tượng ưu tiên</th>
                        <th scope="col">
                            <div class='btn-group'>
                                <button type='button' class='btn btn-success btn-sm  dropdown-toggle'
                                    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    Tiển sử bệnh
                                </button>
                                <div class='dropdown-menu'>
                                    <a class='dropdown-item' style="color:green"
                                        href="./index.php?controller=dondangky&action=filterTSB&from=0&to=0">Không có
                                        bệnh</a>
                                    <a class='dropdown-item' style="color:orange"
                                        href='./index.php?controller=dondangky&action=filterTSB&from=1&to=4'>Từ 1 - 4
                                        bệnh</a>
                                    <a class='dropdown-item' style="color:red"
                                        href='./index.php?controller=dondangky&action=filterTSB&from=5&to=12'>Trên 5
                                        bệnh</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' style="color:blue"
                                        href='./index.php?controller=dondangky'>Hiển thị tất cả</a>
                                </div>
                            </div>
                        </th>
                        <th scope="col">Ngày đăng ký</th>
                        <th scope="col">Ngày muốn tiêm</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Chi tiết</th>
                        <th scope="col">Duyệt đơn</th>
                        <th scope="col">Từ chối</th>
                    </tr>
                </thead>
                <tbody class="row-table">
                    <?php 
                    foreach($results as $item){
                        if(($item["TrangThai"] == 0 || $item["TrangThai"] == 1)){
                            echo 
                            "<tr class='row-content'>
                            <td><input type='checkbox' class='dondangkys' name='dondangkys[]' value='${item["ID_DonDK"]}'></td>
                                <td>${item["MuiTiemThu"]}</td>
                                <td>${item["NhomUuTien"]}</td>";
                            if($item["TienSuBenh"] == null){
                                echo "<td>Không</td>";
                            }
                            else{
                                echo "<td>${item["TienSuBenh"]}</td>";
                            }
                            echo" <td>${item["NgayDK"]}</td>
                                <td>${item["NgayMongMuon"]}</td>
                                ";
        
                            if($item["TrangThai"]== 0){
                                echo "<td style='color:red;font-weight:bold'> Từ chối </td>";
                            }
                            if($item["TrangThai"]== 1){
                                echo "<td style='color:green;font-weight:bold'> Đã duyệt </td>";
                            }
                            echo"
                                <td><a href='./index.php?controller=dondangky&action=chitiet&id=${item["ID_DonDK"]}'><i class='editBtn far fa-eye'></i></a></td>
                                <td><a href='./index.php?controller=dondangky&action=duyet&id=${item["ID_DonDK"]}'><i class='check-btn far fa-check-circle'></i></a></td>
                                <td><a href='./index.php?controller=dondangky&action=loai&id=${item["ID_DonDK"]}'><i class='removeBtn fas fa-trash-alt'></i></a></td>
                            </tr>";
                                
                        }
                        
                    }
                    
                ?>
                </tbody>
            </table>
            <!-- Button duyệt đơn -->
            <button type="button" class="btn btn-success ml-2 mr-2" data-toggle="modal"
                data-target="#exampleModalCenter">
                Duyệt đơn
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận duyệt đơn đăng ký</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Đồng ý duyệt tất cả đơn đăng ký
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                            <input type="submit" value="Đồng ý" class="btn btn-success" name="duyetdon">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button Hủy đơn -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter1">
                Từ chối
            </button>
            <a href="./index.php?controller=xeplichtiemchung"><button type="button" class="btn btn-outline-primary">Xếp lịch</button></a> 
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận từ chối đăng ký</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Đồng ý từ chối tất cả đơn đăng ký
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đồng ý</button>
                            <input type="submit" value="Đồng ý" class="btn btn-success" name="huydon">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php $this->view('frontend.public.footer') ?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script>
    // Chức năng chọn hết
    document.querySelector(".btn1").onclick = function() {
        document.querySelector(".btn2").style.display = "block";
        document.querySelector(".btn1").style.display = "none";

        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('dondangkys[]');

        // Lặp và thiết lập checked
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = true;
        }
    };

    // Chức năng bỏ chọn hết
    document.querySelector(".btn2").onclick = function() {
        document.querySelector(".btn1").style.display = "block";
        document.querySelector(".btn2").style.display = "none";
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('dondangkys[]');

        // Lặp và thiết lập Uncheck
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
    };
    $('#success-alert').fadeTo(2000, 500).slideUp(500, function() {
        $('#success-alert').slideUp(500);
    });
    $(document).ready(function() {
        $('#myWish').click(function showAlert() {
            $('#success-alert').fadeTo(2000, 500).slideUp(500, function() {
                $('#success-alert').slideUp(500);
            });
        });
    });
    </script>

</body>

</html>