<?php
class DondangkyController extends BaseController
{

    private $dangkytiemModel;
    private $userModel;
    private $donviModel;


    public function __construct()
    {
        $this->loadModel("DondangkytiemModel");
        $this->loadModel("NguoidungModel");
        $this->loadModel("DonvitiemchungModel");


        $this->dangkytiemModel = new DondangkytiemModel();
        $this->donviModel = new DonvitiemchungModel();
        $this->userModel = new NguoidungModel();
    }

    public function index($alert = '', $success = '')
    {
        session_start();
        $phone = $_SESSION['admin'];
        $idnguoidung = $this->userModel->getInfoUser("SDT", $phone)["ID_NguoiDung"];
        $iddonvi = $this->donviModel->getInfoDonvi("ID_NguoiDung", $idnguoidung)["ID_DonVi"];
        $results = $this->donviModel->getTwoTable("TinhTP", "QuanHuyen", "XaPhuong", "ID_DonVi", $iddonvi);

        return $this->view('frontend.dondangky.index', [
            "results" => $results,
            "alert" => $alert,
            "success" => $success,

        ]);
    }
    public function filterTSB()
    {
        if (isset($_GET)) {
            session_start();
            $from = $_GET["from"];
            $to = $_GET["to"];

            $phone = $_SESSION['admin'];
            $idnguoidung = $this->userModel->getInfoUser("SDT", $phone)["ID_NguoiDung"];
            $iddonvi = $this->donviModel->getInfoDonvi("ID_NguoiDung", $idnguoidung)["ID_DonVi"];
            $dondangkys = $this->donviModel->getTwoTable("TinhTP", "QuanHuyen", "XaPhuong", "ID_DonVi", $iddonvi);
            $results = [];

            foreach ($dondangkys as $item) {
                if (count(explode(",", $item["TienSuBenh"])) >= $from && count(explode(",", $item["TienSuBenh"])) <= $to  && $item["TienSuBenh"] != '') {
                    array_push($results, $item);
                }
                if ($item["TienSuBenh"] == '' && $from == 0 && $to == 0) {
                    array_push($results, $item);
                }
            }
            return $this->view('frontend.dondangky.index', [
                "results" => $results,
            ]);
        }
    }

    public function chitiet()
    {
        if (!empty($_GET)) {
            $id = $_GET['id'];
            $dondangkys = $this->dangkytiemModel->findById($id);
            $users = $this->userModel->findById($dondangkys["ID_NguoiDung"]);
            return $this->view('frontend.dondangky.detail', [
                "dondangkys" => $dondangkys,
                "users" => $users,
            ]);
        }
    }
    public function loai()
    {
        $id = $_GET['id'];
        $this->dangkytiemModel->updateData($id, ['TrangThai' => 0]);
        header("Location: ./index.php?controller=dondangky");
    }
    public function duyet()
    {
        $id = $_GET['id'];
        $this->dangkytiemModel->updateData($id, ['TrangThai' => 1]);
        header("Location: ./index.php?controller=dondangky");
    }
    public function selectAll()
    {
        if (isset($_POST["dondangkys"])) {
            $dondangkys = $_POST["dondangkys"];
            if (isset($_POST["duyetdon"])) {
                foreach ($dondangkys as $item) {
                    $this->dangkytiemModel->updateData($item, ['TrangThai' => 1]);
                }
                $this->index('', 'Duyệt đơn thành công !');
            }
            if (isset($_POST["huydon"])) {
                foreach ($dondangkys as $item) {
                    $this->dangkytiemModel->updateData($item, ['TrangThai' => 0]);
                }
                $this->index('', 'Từ chối đơn thành công !');
            }
        } else {
            $this->index('Vui lòng chọn đơn đăng ký !');
        }
    }
}
