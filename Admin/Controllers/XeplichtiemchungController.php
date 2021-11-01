<?php
class XeplichtiemchungController extends BaseController
{

    private $DondangkytiemModel;
    private $dottiemModel;
    private $phieutiemModel;
    private $userModel;
    private $donviModel;
    private $vaccineModel;

    public function __construct()
    {
        $this->loadModel("DondangkytiemModel");
        $this->loadModel("DottiemchungModel");
        $this->loadModel("VaccineModel");
        $this->vaccineModel = new VaccineModel();
        $this->loadModel("PhieutiemchungModel");
        $this->loadModel("NguoidungModel");
        $this->loadModel("DonvitiemchungModel");


        $this->userModel = new NguoidungModel();
        $this->donviModel = new DonvitiemchungModel();
        $this->DondangkytiemModel = new DondangkytiemModel();
        $this->dottiemModel = new DottiemchungModel();
        $this->phieutiemModel = new PhieutiemchungModel();
    }

    public function index($alert = "")
    {
        session_start();
        $phone = $_SESSION['admin'];
        $idnguoidung = $this->userModel->getInfoUser("SDT", $phone)["ID_NguoiDung"];
        $iddonvi = $this->donviModel->getInfoDonvi("ID_NguoiDung", $idnguoidung)["ID_DonVi"];

        $dondangkys = $this->donviModel->getTwoTable("TinhTP", "QuanHuyen", "XaPhuong", "ID_DonVi", $iddonvi);
        $dottiems = $this->dottiemModel->getAllInfo("ID_DonVi", $iddonvi);
        $vaccines = [];
        foreach ($dottiems as $item) {
            array_push($vaccines, $this->vaccineModel->findById($item["ID_Vacxin"]));
        }
        return $this->view('frontend.xeplichtiemchung.index', [
            "dondangkys" => $dondangkys,
            "dottiems" => $dottiems,
            "vaccines" => $vaccines,
            "alert" => $alert

        ]);
    }
    public function xeplich()
    {
        if (!isset($_POST["dondangky"])) {
            $this->index("Vui lòng chọn đơn đăng ký");
        } else {
            $ID_DonDK = $_POST["dondangky"];
            $ID_DotTC = $_POST["dottiem"];
            $ngaytiem = $_POST["ngaytiem"];
            $ngaytiem = implode($ngaytiem);
            $giotiem = $_POST["giotiem"];
            $giotiem = implode($giotiem);
            foreach ($ID_DonDK as $item) {
                $this->DondangkytiemModel->updateData($item, ['TrangThai' => 2]);
                $this->phieutiemModel->store([
                    "ID_DonDK" => $item,
                    "ID_DotTC" => $ID_DotTC,
                    "NgayTiem" => $ngaytiem,
                    "GioTiem" => $giotiem,
                ]);
            }
            $this->index();
        }
    }
}
