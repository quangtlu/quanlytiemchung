<?php
class VaccineController extends BaseController
{
    private $vaccineModel;

    public function __construct()
    {
        $this->loadModel("VaccineModel");
        $this->vaccineModel = new VaccineModel();
    }

    public function index($success = '')
    {
        $vaccines = $this->vaccineModel->getAll();

        return $this->view('frontend.vaccine.index', [
            'vaccines' => $vaccines,
            'success' => $success,

        ]);
    }
    public function themvacxin($alert = "")
    {
        return $this->view('frontend.vaccine.add', [
            "alert" => $alert
        ]);
    }

    public function store()
    {
        if (!empty($_POST)) {
            $tenVC = $_POST["tenVacine"];
            $hsx = $_POST["hsx"];
            $quocgia = $_POST["quocGia"];
            $loaiVaccine = $_POST["loaiVaccine"];
            $tuoi = $_POST["age"];
            $soMuiTiem = $_POST["soMui"];
            $khoangCach = $_POST["khoangCach"];
            $data = [
                'TenVacxin' => $tenVC,
                'LoaiVacxin' => $loaiVaccine,
                'HangSanXuat' => $hsx,
                'QuocGia' => $quocgia,
                'SoMui' => $soMuiTiem,
                'DoiTuong' => $tuoi,
                'KhoangCach' => $khoangCach
            ];
            if ($this->vaccineModel->checkExist("TenVacxin", $tenVC)) {
                $this->themvacxin("Tên vắc-xin đã tồn tại");
            } else {
                $this->vaccineModel->store($data);
                header("Location: ./index.php?controller=vaccine");
            }
        }
    }
    public function suavacxin($alert = "")
    {
        $id = $_GET['id'];
        $vaccines = $this->vaccineModel->findById($id);

        return $this->view('frontend.vaccine.update', [
            "vaccines" => $vaccines,
            "alert" => $alert
        ]);
    }
    public function update()
    {

        if (!empty($_POST) && !empty($_GET)) {
            $id = $_GET['id'];
            $tenVC = $_POST["tenVacine"];
            $hsx = $_POST["hsx"];
            $quocgia = $_POST["quocGia"];
            $loaiVaccine = $_POST["loaiVaccine"];
            $tuoi = $_POST["age"];
            $soMuiTiem = $_POST["soMui"];
            $khoangCach = $_POST["khoangCach"];
            $data =
                [
                    'TenVacxin' => $tenVC,
                    'LoaiVacxin' => $loaiVaccine,
                    'HangSanXuat' => $hsx,
                    'QuocGia' => $quocgia,
                    'SoMui' => $soMuiTiem,
                    'DoiTuong' => $tuoi,
                    'KhoangCach' => $khoangCach
                ];
            if ($this->vaccineModel->checkExitsUpdate("TenVacxin", $tenVC, $id)) {
                $this->suavacxin("Tên vắc-xin đã tồn tại");
            } else {
                $this->vaccineModel->updateData($id, $data);
                header("Location: ./index.php?controller=vaccine");
            }
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->vaccineModel->deleteData($id);
        header("Location: ./index.php?controller=vaccine");
    }
}
