<?php
class RoleController extends BaseController
{
    private $roleModel;

    public function __construct()
    {
        $this->loadModel("RoleModel");
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        $roles = $this->roleModel->getAll();

        return $this->view('frontend.roles.index', [
            'roles' => $roles
        ]);
    }
    public function addRule($alert = '')
    {
        return $this->view('frontend.roles.add', [
            'alert' => $alert
        ]);
    }

    public function store()
    {
        if (isset($_POST["rolename"]) && isset($_POST["chucnang"])) {
            $nhomquyen = $_POST["rolename"];
            if (!isset($_POST["chucnang"])) {
                $chucnangStr = 'Người dùng';
            } else {
                $chucnangArr = $_POST["chucnang"];
                $chucnangStr = implode(", ", $chucnangArr);
            }
            $data = [
                'TenNhomQuyen' => $nhomquyen,
                'ChucNang' => $chucnangStr

            ];
            if ($this->roleModel->checkExist("TenNhomQuyen", $nhomquyen)) {
                $this->addRule('Tên nhóm quyền đã tồn tại');
            } else {
                $this->roleModel->store($data);
                header("Location: ./index.php?controller=role");
            }
        } else {
            $this->addRule('Vui lòng chọn chức năng');
        }
    }
    public function editRole($alert = '')
    {
        $id = $_GET['id'];
        $roles = $this->roleModel->findById($id);
        return $this->view('frontend.roles.update', [
            "roles" => $roles,
            "alert" => $alert,
            "id" => $id

        ]);
    }
    public function update()
    {
        if (!empty($_POST) && !empty($_GET)) {
            $id = $_GET['id'];
            $nhomquyen = $_POST["rolename"];
            if (!isset($_POST["chucnang"])) {
                $chucnangStr = 'Người dùng';
            } else {
                $chucnangArr = $_POST["chucnang"];
                $chucnangStr = implode(", ", $chucnangArr);
            }
            $data = [
                'TenNhomQuyen' => $nhomquyen,
                'ChucNang' => $chucnangStr

            ];
            if ($this->roleModel->checkExitsUpdate("TenNhomQuyen", $nhomquyen, $id)) {
                $alert = "Tên nhóm quyền đã tồn tại";
                $this->editRole($alert);
            } else {
                $this->roleModel->updateData($id, $data);
                header("Location: ./index.php?controller=role");
            }
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->roleModel->deleteData($id);
        header("Location: ./index.php?controller=role");
    }
}
