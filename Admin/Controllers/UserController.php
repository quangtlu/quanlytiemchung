<?php
class UserController extends BaseController
{
    private $userModel;
    private $roleModel;
    public function __construct()
    {
        $this->loadModel("NguoidungModel");
        $this->userModel = new NguoidungModel();

        $this->loadModel("RoleModel");
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        $users = $this->userModel->getAll();
        $roles = [];
        foreach ($users as $item) {
            array_push($roles, $this->roleModel->getInfoRole('ID_NhomQuyen', $item['ID_NhomQuyen']));
        }
        return $this->view('frontend.nguoidung.index', [
            "users" => $users,
            "roles" => $roles,
        ]);
    }
    public function adduser($alert = '')
    {
        $roles = $this->roleModel->getAll();
        return $this->view('frontend.nguoidung.add', [
            'roles' => $roles,
            'alert' => $alert
        ]);
    }

    public function store()
    {
        if (!empty($_POST)) {
            $hoten = $_POST["hoten"];
            $email = $_POST["email"];
            $gioitinh = $_POST["gioitinh"];
            $cmnd = $_POST["cmnd"];
            $ngaysinh = $_POST["ngaysinh"];
            $sdt = $_POST["sdt"];
            $diachi = $_POST["diachi"];
            $quoctich = $_POST["quoctich"];
            $nghenghiep = $_POST["nghenghiep"];
            $dantoc = $_POST["dantoc"];
            $bhyt = $_POST["bhyt"];

            $tennhomquyen = $_POST['tennhomquyen'];
            $idnhomquyen = $this->roleModel->getInfoRole('TenNhomQuyen', $tennhomquyen)['ID_NhomQuyen'];
            $matkhau = $_POST["matkhau"];
            $data = [
                'HoTen' => $hoten,
                'Email' => $email,
                'GioiTinh' => $gioitinh,
                'CMND' => $cmnd,
                'NgaySinh' => $ngaysinh,
                'SDT' => $sdt,
                'ID_NhomQuyen' => $idnhomquyen,
                'MatKhau' => $matkhau,
                'DiaChi' => $diachi,
                'QuocTich' => $quoctich,
                'NgheNghiep' => $nghenghiep,
                'DanToc' => $dantoc,
                'BHYT' => $bhyt,

            ];
            if ($this->userModel->checkExist("CMND", $cmnd)) {
                $alert = "Số CMND/CCCD đã được đăng ký";
                $this->adduser($alert);
            } else if ($this->userModel->checkExist("SDT", $sdt)) {
                $alert = "Số điện thoại` đã được đăng ký";
                $this->adduser($alert);
            } else {
                $this->userModel->store($data);
                header("Location: ./index.php?controller=user");
            }
        }
    }
    public function edituser($alert = '')
    {
        $id = $_GET['id'];
        $roles = $this->roleModel->getAll();
        $users = $this->userModel->findById($id);
        return $this->view(
            'frontend.nguoidung.edit',
            [
                'users' => $users,
                'id' => $id,
                'alert' => $alert,
                'roles' => $roles,
            ]
        );
    }
    public function update()
    {
        if (isset($_POST) && isset($_GET)) {
            $id = $_GET["id"];
            $hoten = $_POST["hoten"];
            $cmnd = $_POST["cmnd"];
            $ngaysinh = $_POST["ngaysinh"];
            $sdt = $_POST["sdt"];
            $email = $_POST["email"];
            $gioitinh = $_POST["gioitinh"];
            $quoctich = $_POST["quoctich"];
            $nghenghiep = $_POST["nghenghiep"];
            $dantoc = $_POST["dantoc"];
            $bhyt = $_POST["bhyt"];
            $tennhomquyen = $_POST['tennhomquyen'];
            $idnhomquyen = $this->roleModel->getInfoRole('TenNhomQuyen', $tennhomquyen)['ID_NhomQuyen'];
            $matkhau = $_POST["matkhau"];
            $diachi = $_POST["diachi"];

            $data = [
                'HoTen' => $hoten,
                'CMND' => $cmnd,
                'NgaySinh' => $ngaysinh,
                'SDT' => $sdt,
                'Email' => $email,
                'GioiTinh' => $gioitinh,
                'ID_NhomQuyen' => $idnhomquyen,
                'MatKhau' => $matkhau,
                'DiaChi' => $diachi,
                'QuocTich' => $quoctich,
                'NgheNghiep' => $nghenghiep,
                'DanToc' => $dantoc,
                'BHYT' => $bhyt,

            ];
            if ($this->userModel->checkExitsUpdate("CMND", $cmnd, $id)) {
                $alert = "Số CMND/CCCD đã được đăng ký";
                $this->edituser($alert);
            } else if ($this->userModel->checkExitsUpdate("SDT", $sdt, $id)) {
                $alert = "Số điện thoại đã được đăng ký";
                $this->edituser($alert);
            } else {
                $this->userModel->updateData($id, $data);
                header("Location: ./index.php?controller=user");
            }
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->userModel->deleteData($id);
        header("Location: ./index.php?controller=user");
    }
    public function chitiet()
    {
        if (!empty($_GET)) {
            $id = $_GET['id'];
            $users = $this->userModel->findById($id);
            $roles = $this->roleModel->getInfoRole("ID_NhomQuyen", $users["ID_NhomQuyen"]);
            return $this->view('frontend.nguoidung.detail', [
                "roles" => $roles,
                "users" => $users,
            ]);
        }
    }
}
