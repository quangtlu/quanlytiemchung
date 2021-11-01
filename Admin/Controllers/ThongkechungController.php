<?php
class ThongkechungController extends BaseController
{

    private $dangkytiemModel;
    private $donviModel;

    public function __construct()
    {
        $this->loadModel("DondangkytiemModel");
        $this->dangkytiemModel = new DondangkytiemModel();

        $this->loadModel("DonvitiemchungModel");
        $this->donviModel = new DonvitiemchungModel();

    }
    // Thống kê theo đơn đăng ký 
    public function index()
    {
        $chuaduyet = [];
        $daduyet = [];
        $chuatiem = [];
        $datiem = [];
        $donvis = $this->donviModel->getAll();
        $tendonvis = [];
        
        foreach($donvis as $item){
            if(isset($_POST["ngaybd"]) && isset($_POST["ngaykt"])){
                $ngaybd = $_POST["ngaybd"];
                $ngaykt = $_POST["ngaykt"];
                
                array_push($chuaduyet,$this->dangkytiemModel->count(0,$item["TenDonVi"],$ngaybd,$ngaykt));
                array_push($daduyet,$this->dangkytiemModel->count(1,$item["TenDonVi"],$ngaybd,$ngaykt));
                array_push($chuatiem,$this->dangkytiemModel->count(2,$item["TenDonVi"],$ngaybd,$ngaykt));
                array_push($datiem,$this->dangkytiemModel->count(3,$item["TenDonVi"],$ngaybd,$ngaykt));
            }
            else{
                array_push($chuaduyet,$this->dangkytiemModel->count(0,$item["TenDonVi"]));
                array_push($daduyet,$this->dangkytiemModel->count(1,$item["TenDonVi"]));
                array_push($chuatiem,$this->dangkytiemModel->count(2,$item["TenDonVi"]));
                array_push($datiem,$this->dangkytiemModel->count(3,$item["TenDonVi"]));
            }
            if(isset($_POST["tendonvi"])){
                if($item["TenDonVi"] == $_POST["tendonvi"]){
                    array_push($tendonvis,$item);
                }
            }
            else{
                array_push($tendonvis,$item);
            }
        }
        
        $this->view("frontend.baocaochung.index",[
            "chuaduyet" => $chuaduyet,
            "daduyet" => $daduyet,
            "chuatiem" => $chuatiem,
            "datiem" => $datiem,
            "tendonvis" => $tendonvis,

            "tongchuaduyet" => $tongchuaduyet = 0,
            "tongdaduyet" => $tongdaduyet = 0,
            "tongchuatiem" => $tongchuatiem = 0,
            "tongdatiem" => $tongdatiem = 0,
            
        ]);
        

    }
    // Thống kê theo tuổi
    public function dotuoi(){
        $age1 = [];
        $age2 = [];
        $age3 = [];
        $age4 = [];
        $age5 = [];

        $donvis = $this->donviModel->getAll();
        $tendonvis = [];
        
        foreach($donvis as $item){
            if(!empty($_POST["ngaybd"]) && !empty($_POST["ngaykt"])){
                $ngaybd = $_POST["ngaybd"];
                $ngaykt = $_POST["ngaykt"];
                if(!empty($_POST["tuoibd"]) && !empty($_POST["tuoikt"])){
                    $tuoibd = $_POST["tuoibd"];
                    $tuoikt = $_POST["tuoikt"];
                    array_push($age5,$this->dangkytiemModel->countAge($item["TenDonVi"],$tuoibd,$tuoikt,$ngaybd,$ngaykt));
                }
                array_push($age1,$this->dangkytiemModel->countAge($item["TenDonVi"],12,17,$ngaybd,$ngaykt));
                array_push($age2,$this->dangkytiemModel->countAge($item["TenDonVi"],18,35,$ngaybd,$ngaykt));
                array_push($age3,$this->dangkytiemModel->countAge($item["TenDonVi"],36,65,$ngaybd,$ngaykt));
                array_push($age4,$this->dangkytiemModel->countAge($item["TenDonVi"],66,200,$ngaybd,$ngaykt));
            }
            else{
                array_push($age1,$this->dangkytiemModel->countAge($item["TenDonVi"],12,17));
                array_push($age2,$this->dangkytiemModel->countAge($item["TenDonVi"],18,35));
                array_push($age3,$this->dangkytiemModel->countAge($item["TenDonVi"],36,65));
                array_push($age4,$this->dangkytiemModel->countAge($item["TenDonVi"],66,200));
                }
                if(isset($_POST["tendonvi"])){
                    if($item["TenDonVi"] == $_POST["tendonvi"]){
                        array_push($tendonvis,$item);
                    }
                }
                else{
                    array_push($tendonvis,$item);
                }
        }
        if(!empty($_POST["tuoibd"]) && !empty($_POST["tuoikt"])){
            $tuoibd = $_POST["tuoibd"];
            $tuoikt = $_POST["tuoikt"];

            $this->view("frontend.baocaochung.thongketheotuoi",[
                "age1" => $age1,
                "age2" => $age2,
                "age3" => $age3,
                "age4" => $age4,
                "age5" => $age5,
                "tuoibd" => $tuoibd,
                "tuoikt" => $tuoikt,
                "tendonvis" => $tendonvis,

                "sumAge1" => $sumAge1 = 0,
                "sumAge2" => $sumAge2 = 0,
                "sumAge3" => $sumAge3 = 0,
                "sumAge4" => $sumAge4 = 0,
                "sumAge5" => $sumAge5 = 0,

            ]);
        }
        else{
            $this->view("frontend.baocaochung.thongketheotuoi",[
                "age1" => $age1,
                "age2" => $age2,
                "age3" => $age3,
                "age4" => $age4,
                "tendonvis" => $tendonvis,

                "sumAge1" => $sumAge1 = 0,
                "sumAge2" => $sumAge2 = 0,
                "sumAge3" => $sumAge3 = 0,
                "sumAge4" => $sumAge4 = 0,
            ]);
        }

    }
    // Chi tiết danh sách người dân đã tiêm theo đơn vị
    public function detail(){
        if(!empty($_GET["tendonvi"])){
            if($_GET["tendonvi"] != 'all'){
                $tendonvi = $_GET["tendonvi"];
                $users = $this->dangkytiemModel->getUserInfoDaTiem($tendonvi);
                $this->view("frontend.baocaochung.detail",[
                    "users" => $users,
                    "tendonvi" => $tendonvi,
                ]);
            }
            else{
                $donvis = $this->donviModel->getAll();
                $users = [];

                foreach($donvis  as $item){
                    array_push($users,$this->dangkytiemModel->getUserInfoDaTiem($item["TenDonVi"]));
                }

                $users = call_user_func_array("array_merge", $users);

                $this->view("frontend.baocaochung.detail",[
                    "users" => $users,
                ]);
            }
        }
    }
    // Thống kê theo mũi tiêm

    public function muitiem(){
        $mui1 = [];
        $mui2 = [];
        $mui3 = [];
        $mui = [];

        $donvis = $this->donviModel->getAll();
        $tendonvis = [];
        
        foreach($donvis as $item){
            if(!empty($_POST["ngaybd"]) && !empty($_POST["ngaykt"])){
                $ngaybd = $_POST["ngaybd"];
                $ngaykt = $_POST["ngaykt"];
                if(!empty($_POST["muitiemthu"])){
                    $muitiemthu = $_POST["muitiemthu"];
                    array_push($mui,$this->dangkytiemModel->countMuitiem($item["TenDonVi"],$muitiemthu,$ngaybd,$ngaykt));
                }
                array_push($mui1,$this->dangkytiemModel->countMuitiem($item["TenDonVi"],1,$ngaybd,$ngaykt));
                array_push($mui2,$this->dangkytiemModel->countMuitiem($item["TenDonVi"],2,$ngaybd,$ngaykt));
                array_push($mui3,$this->dangkytiemModel->countMuitiem($item["TenDonVi"],3,$ngaybd,$ngaykt));
            }
            else{
                array_push($mui1,$this->dangkytiemModel->countMuitiem($item["TenDonVi"],1));
                array_push($mui2,$this->dangkytiemModel->countMuitiem($item["TenDonVi"],2));
                array_push($mui3,$this->dangkytiemModel->countMuitiem($item["TenDonVi"],3));
                }   
                if(isset($_POST["tendonvi"])){
                    if($item["TenDonVi"] == $_POST["tendonvi"]){
                        array_push($tendonvis,$item);
                    }
                }
                else{
                    array_push($tendonvis,$item);
                }
        }
        if(!empty($_POST["muitiemthu"])){
            $muitiemthu = $_POST["muitiemthu"];

            $this->view("frontend.baocaochung.thongketheomuitiem",[
                "mui1" => $mui1,
                "mui2" => $mui2,
                "mui3" => $mui3,
                "mui" => $mui,
                "tendonvis" => $tendonvis,
                "muitiemthu" => $muitiemthu,

                "sumMui1" => $sumMui1 = 0,
                "sumMui2" => $sumMui2 = 0,
                "sumMui3" => $sumMui3 = 0,
                "sumMui" => $sumMui = 0,
            ]);
        }
        else{
            $this->view("frontend.baocaochung.thongketheomuitiem",[
                "mui1" => $mui1,
                "mui2" => $mui2,
                "mui3" => $mui3,
                "tendonvis" => $tendonvis,

                "sumMui1" => $sumMui1 = 0,
                "sumMui2" => $sumMui2 = 0,
                "sumMui3" => $sumMui3 = 0,
            ]);
        }

    }
    // Thống kê theo vaccine

    public function vaccine(){
        $vaccine1 = [];
        $vaccine2 = [];
        $vaccine3 = [];
        $vaccine4 = [];
        $vaccine5 = [];
        $vaccine6 = [];

        $donvis = $this->donviModel->getAll();
        $tendonvis = [];
        
        foreach($donvis as $item){
            if(!empty($_POST["ngaybd"]) && !empty($_POST["ngaykt"])){
                $ngaybd = $_POST["ngaybd"];
                $ngaykt = $_POST["ngaykt"];

                array_push($vaccine1,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Vaccine AstraZeneca",$ngaybd,$ngaykt));
                array_push($vaccine2,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Gam-COVID-Vac",$ngaybd,$ngaykt));
                array_push($vaccine3,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Vero Cell",$ngaybd,$ngaykt));
                array_push($vaccine4,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Vaccine Comirnaty",$ngaybd,$ngaykt));
                array_push($vaccine5,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Vaccine Spikevax",$ngaybd,$ngaykt));
                array_push($vaccine6,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Vaccine Janssen",$ngaybd,$ngaykt));
            }
            else{
                array_push($vaccine1,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Vaccine AstraZeneca"));
                array_push($vaccine2,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Gam-COVID-Vac"));
                array_push($vaccine3,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Vero Cell"));
                array_push($vaccine4,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Vaccine Comirnaty"));
                array_push($vaccine5,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Vaccine Spikevax"));
                array_push($vaccine6,$this->dangkytiemModel->countVaccine($item["TenDonVi"],"Vaccine Janssen"));
                }   
            if(isset($_POST["tendonvi"])){
                if($item["TenDonVi"] == $_POST["tendonvi"]){
                    array_push($tendonvis,$item);
                }
            }
            else{
                array_push($tendonvis,$item);
            }
        }

        $this->view("frontend.baocaochung.thongketheovaccine",[
            "vaccine1" => $vaccine1,
            "vaccine2" => $vaccine2,
            "vaccine3" => $vaccine3,
            "vaccine4" => $vaccine4,
            "vaccine5" => $vaccine5,
            "vaccine6" => $vaccine6,

            "tendonvis" => $tendonvis,

            "sumVaccine1" => $sumVaccine1 = 0,
            "sumVaccine2" => $sumVaccine2 = 0,
            "sumVaccine3" => $sumVaccine3 = 0,
            "sumVaccine4" => $sumVaccine4 = 0,
            "sumVaccine5" => $sumVaccine5 = 0,
            "sumVaccine6" => $sumVaccine6 = 0,
        ]);
        

    }
}
