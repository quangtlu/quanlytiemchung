<?php
class HomeController extends BaseController
{


    private $NguoidungModel;
    private $roleModel;

    public function __construct()
    {
        $this->loadModel("NguoidungModel");
        $this->NguoidungModel = new NguoidungModel();

        $this->loadModel("RoleModel");
        $this->roleModel = new RoleModel();
    }
    public function index()
    {
        return $this->view('frontend.home.index');
    }
    public function dangnhap($alert = '')
    {
        return $this->view('frontend.login.index', [
            'alert' => $alert
        ]);
    }
    public function singin()
    {
        if (!empty($_POST)) {
            $phone = $_POST['phone'];
            $PASS = $_POST['password'];
            session_start();
            $_SESSION['admin'] = $phone;
            if ($this->NguoidungModel->checkExist("SDT", $phone)) {
                $userInfo = $this->NguoidungModel->getInfoUser('SDT', $phone);
                $IdRole = $userInfo['ID_NhomQuyen'];
                $roleName = $this->roleModel->findById($IdRole)['TenNhomQuyen'];
            }

            if (isset($roleName) && $roleName == NULL) {
                $this->dangnhap('Tài khoản không có quyền truy cập');
            } else if (!$this->NguoidungModel->checkExist("SDT", $phone)) {
                $this->dangnhap('Số điện thoại chưa được đăng ký');
            } else if (!$this->NguoidungModel->checkExist("MatKhau", $PASS)) {
                $this->dangnhap('Mật khẩu không chính xác');
            } else {
                header("Location: ./index.php?controller=home");
            }
        }
    }
    public function logout()
    {
        session_start();
        unset($_SESSION["admin"]);
        header("Location: ./index.php?controller=home&action=dangnhap");
    }
}
