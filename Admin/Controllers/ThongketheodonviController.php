<?php
class ThongketheodonviController extends BaseController
{

    private $dangkytiemModel;
    private $donviModel;

    public function __construct()
    {
        $this->loadModel("DondangkytiemModel");
        $this->dangkytiemModel = new DondangkytiemModel();

        $this->loadModel("DonvitiemchungModel");
        $this->donviModel = new DonvitiemchungModel();

        $this->loadModel("VaccineModel");
        $this->vaccineModel = new VaccineModel();

    }

    // Thống kê theo mũi tiêm
    public function index()
    {
        $donvis = $this->donviModel->getAll();
        $maxMuitiemthu = $this->dangkytiemModel->getMax("MuiTiemThu","TrangThai",3)['max'];

        if(!empty($_POST["donvi"])){
            $tendonvi = $_POST["donvi"];
            $soluongs = [];
            for($i = 1; $i<=$maxMuitiemthu; $i++){
                if(!empty($_POST["ngaybd"]) && !empty($_POST["ngaykt"])){
                    $ngaybd = $_POST["ngaybd"];
                    $ngaykt = $_POST["ngaykt"];
                    array_push($soluongs,$this->dangkytiemModel->countMuitiem($tendonvi,$i,$ngaybd,$ngaykt));
                }
                else{
                    array_push($soluongs,$this->dangkytiemModel->countMuitiem($tendonvi,$i));
                }
            }
            $this->view("frontend.baocaochodonvi.index",[
                "maxMuitiemthu" => $maxMuitiemthu,
                "donvis" => $donvis,
                "tendonvi" => $tendonvi,
                "soluongs" => $soluongs,
            ]);
        }
        else{
            $this->view("frontend.baocaochodonvi.index",[
                "donvis" => $donvis,
            ]);
        }
    }
    // Thống kê theo độ tuổi
    public function dotuoi()
    {
        $donvis = $this->donviModel->getAll();

        if(!empty($_POST["donvi"])){
            $tendonvi = $_POST["donvi"];
            $age1 = [];
            $age2 = [];
            $age3 = [];
            $age4 = [];

            if(!empty($_POST["ngaybd"]) && !empty($_POST["ngaykt"])){
                $ngaybd = $_POST["ngaybd"];
                $ngaykt = $_POST["ngaykt"];
                array_push($age1,$this->dangkytiemModel->countAge($tendonvi,12,17,$ngaybd,$ngaykt));
                array_push($age2,$this->dangkytiemModel->countAge($tendonvi,18,35,$ngaybd,$ngaykt));
                array_push($age3,$this->dangkytiemModel->countAge($tendonvi,36,65,$ngaybd,$ngaykt));
                array_push($age4,$this->dangkytiemModel->countAge($tendonvi,66,200,$ngaybd,$ngaykt));
            }
            else{
                array_push($age1,$this->dangkytiemModel->countAge($tendonvi,12,17));
                array_push($age2,$this->dangkytiemModel->countAge($tendonvi,18,35));
                array_push($age3,$this->dangkytiemModel->countAge($tendonvi,36,65));
                array_push($age4,$this->dangkytiemModel->countAge($tendonvi,66,200));
            }
            $this->view("frontend.baocaochodonvi.dotuoi",[
                "donvis" => $donvis,
                "tendonvi" => $tendonvi,
                "age1" => $age1,
                "age2" => $age2,
                "age3" => $age3,
                "age4" => $age4,
            ]);
        }

        
        else{
            $this->view("frontend.baocaochodonvi.dotuoi",[
                "donvis" => $donvis,
            ]);
        }
    }
    // Thống kê theo vaccine
    public function vaccine()
    {
        $vaccines = $this->vaccineModel->getAll();
        $donvis = $this->donviModel->getAll();
        if(!empty($_POST["donvi"])){
            $tendonvi = $_POST["donvi"];
            $soluongs = [];
            for($i = 0; $i<count($vaccines); $i++){
                if(!empty($_POST["ngaybd"]) && !empty($_POST["ngaykt"])){
                    $ngaybd = $_POST["ngaybd"];
                    $ngaykt = $_POST["ngaykt"];
                    array_push($soluongs,$this->dangkytiemModel->countVaccine($tendonvi,$vaccines[$i]["TenVacxin"],$ngaybd,$ngaykt));
                }
                else{
                    array_push($soluongs,$this->dangkytiemModel->countVaccine($tendonvi,$vaccines[$i]["TenVacxin"]));
                }
            }
            $this->view("frontend.baocaochodonvi.vaccine",[
                "vaccines" => $vaccines,
                "donvis" => $donvis,
                "tendonvi" => $tendonvi,
                "soluongs" => $soluongs,
            ]);
        }
        else{
            $this->view("frontend.baocaochodonvi.vaccine",[
                "vaccines" => $vaccines,
                "donvis" => $donvis,
            ]);
        }
    }

}
