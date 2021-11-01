<?php
class PhieutiemController extends BaseController
{

    private $dangkytiemModel;
    private $userModel;
    private $donviModel;
    private $vaccineModel;
    private $phieutiemModel;
    private $dottiemModel;
    private $chitietmuitiemModel;

    public function __construct()
    {
        $this->loadModel("DondangkytiemModel");
        $this->loadModel("NguoidungModel");
        $this->loadModel("DonvitiemchungModel");
        $this->loadModel("VaccineModel");
        $this->loadModel("PhieutiemchungModel");
        $this->loadModel("DottiemchungModel");
        $this->loadModel("ChitietmuitiemModel");

        $this->chitietmuitiemModel = new ChitietmuitiemModel();
        $this->dangkytiemModel = new DondangkytiemModel();
        $this->donviModel = new DonvitiemchungModel();
        $this->userModel = new NguoidungModel();
        $this->vaccineModel = new VaccineModel();
        $this->phieutiemModel = new PhieutiemchungModel();
        $this->dottiemModel = new DottiemchungModel();
    }

    public function index()
    {
        session_start();
        $phone = $_SESSION['admin'];
        $idnguoidungdau = $this->userModel->getInfoUser("SDT", $phone)["ID_NguoiDung"];
        $donvis = $this->donviModel->getInfoDonvi("ID_NguoiDung", $idnguoidungdau);
        $iddonvi = $donvis["ID_DonVi"];
        $phieutiems = $this->phieutiemModel->findByTwoCondition("TrangThai", 0, "ID_DotTC", "ID_DonVi", $iddonvi);
        $users = [];
        foreach ($phieutiems as $item) {
            array_push($users, $this->userModel->findByOneCondition("ID_NguoiDung", "ID_DonDK", $item["ID_DonDK"]));
        }

        if (isset($_POST["keyword"])) {
            $keyword = $_POST["keyword"];
            $result = [];
            foreach ($users as $item) {
                if ($item["SDT"] == $keyword) {
                    array_push($result, $item);
                }
            }
            return $this->view('frontend.phieutiem.index', [
                "result" => $result,
            ]);
        } else {
            $result = $users;
            return $this->view('frontend.phieutiem.index', [
                "result" => $result,
            ]);
        }
    }
    public function chitiet()
    {
        if (!empty($_GET)) {
            $id = $_GET['id'];
            $users = $this->userModel->findById($id);
            session_start();
            $phone = $_SESSION['admin'];
            $idnguoidungdau = $this->userModel->getInfoUser("SDT", $phone)["ID_NguoiDung"];
            $dondangkys = $this->dangkytiemModel->getDiff("ID_NguoiDung", $id, "TrangThai", 3);
            $donvis = $this->donviModel->getInfoDonvi("ID_NguoiDung", $idnguoidungdau);
            $iddonvi = $donvis["ID_DonVi"];
            $dottiems = $this->dottiemModel->getInfoDottiem("ID_DonVi", $iddonvi);
            $vaccines = $this->vaccineModel->findById($dottiems["ID_Vacxin"]);
            $phieutiems = $this->phieutiemModel->getInfoPhieutiem("ID_DonDK", $dondangkys["ID_DonDK"]);

            return $this->view('frontend.phieutiem.detail', [
                "dondangkys" => $dondangkys,
                "users" => $users,
                "vaccines" => $vaccines,
                "phieutiems" => $phieutiems,
                "donvis" => $donvis,

            ]);
        }
    }
    public function duyet()
    {
        $id = $_GET['id'];
        $trieuchung = $_POST["trieuchung"];
        $dondangkys = $this->dangkytiemModel->getDiff("ID_NguoiDung", $id, "TrangThai", 3);
        $phieutiems = $this->phieutiemModel->getInfoPhieutiem("ID_DonDK", $dondangkys["ID_DonDK"]);

        $this->dangkytiemModel->updateData($dondangkys["ID_DonDK"], ['TrangThai' => 3]);
        $this->phieutiemModel->updateData($phieutiems["ID_phieu"], ['TrangThai' => 1]);

        $data = [
            "ID_phieu" => $phieutiems["ID_phieu"],
            "ID_NguoiDung" => $id,
            "TrieuChung" => $trieuchung,

        ];
        $this->chitietmuitiemModel->store($data);
        header("Location: ./index.php?controller=phieutiem");
    }
}
