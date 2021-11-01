<?php
class DondangkytiemController extends BaseController{

    private $DondangkytiemModel;
    private $userModel;
    private $phieutiemModel;
    private $donviModel;
    private $vaccineModel;
    private $dottiemModel;
    private $chitietmuitiemModel;

    public function __construct()
    {
        $this->loadModel("DondangkytiemModel");
        $this->loadModel("NguoidungModel");
        $this->loadModel("PhieutiemchungModel");
        $this->loadModel("DonvitiemchungModel");
        $this->loadModel("VaccineModel");
        $this->loadModel("DottiemchungModel");

        $this->loadModel("ChitietmuitiemModel");
        $this->chitietmuitiemModel = new ChitietmuitiemModel();
        $this->userModel = new NguoidungModel();
        $this->DondangkytiemModel = new DondangkytiemModel();
        $this->phieutiemModel = new PhieutiemchungModel();
        $this->donviModel = new DonvitiemchungModel();
        $this->vaccineModel = new VaccineModel();
        $this->dottiemModel = new DottiemchungModel();

    }
    
    public function index($danger='',$success=''){
        session_start();
        $userInfo = $this->userModel->getInfoUser('SDT',$_SESSION['phone']);
        $chitiets = $this->chitietmuitiemModel->getAllInfo("ID_NguoiDung",$userInfo["ID_NguoiDung"]);
        return $this->view('frontend.dondangkytiem.index',[
            "danger" => $danger,
            "success" => $success,
            "count" => count($chitiets)+1
        ]);
    }

    public function register(){
        if(!empty($_POST)){
            $userInfo = $this->userModel->getInfoUser('SDT',$_GET['phone']);
            $chitiets = $this->chitietmuitiemModel->getAllInfo("ID_NguoiDung",$userInfo["ID_NguoiDung"]);
            $tiensuArr = $_POST["tiensu"] ?? [""];
            $tiensuStr = implode(", ",$tiensuArr);
            $ngaymongmuon = $_POST["ngaymongmuon"] ?? null;
            $muitiemthu = count($chitiets)+1;
            $tinhTP = $_POST["province"];
            $quanHuyen = $_POST["district"];
            $phuongXa = $_POST["ward"];
            $uutien = $_POST["uutien"];
           
            $data = [
                        'ID_NguoiDung' =>$userInfo['ID_NguoiDung'],
                        'NhomUuTien' => $uutien,
                        'TienSuBenh' => $tiensuStr,
                        'NgayMongMuon' => $ngaymongmuon,
                        'muitiemthu' => $muitiemthu,
                        'TinhTP' => $tinhTP,
                        'QuanHuyen' => $quanHuyen,
                        'XaPhuong' => $phuongXa,
                    ];
                    $dondangkys = $this->DondangkytiemModel->getAllInfo("ID_NguoiDung",$userInfo['ID_NguoiDung']);
                    $flag = true;
                    for($i=0; $i<count($dondangkys);$i++){
                        if($dondangkys[$i]["TrangThai"] != 3){
                            $flag = false;
                            break;
                        }
                    }

                    if ($flag == false){
                        $this->index('Đơn đăng ký đang được xét duyệt','');
                    }
                    else{
                        $this->DondangkytiemModel->store($data);
                        $this->tracuu('Đăng ký thành công');
                    }
            }
        
    }
    public function tracuu(){
        $userInfo = $this->userModel->getInfoUser('SDT',$_GET['phone']);
        $dondangkyInfo = $this->DondangkytiemModel->getDiff("ID_NguoiDung",$userInfo["ID_NguoiDung"],"TrangThai",3);
        $this->view("frontend.dondangkytiem.view",[
            "dondangkyInfo" => $dondangkyInfo,
        ]);

    }
    public function suathongtin(){
        $userInfo = $this->userModel->getInfoUser('SDT',$_GET['phone']);
        $dondangkyInfo = $this->DondangkytiemModel->finByTwoValue("ID_NguoiDung",$userInfo['ID_NguoiDung'],"TrangThai",0);
        $flag = $this->chitietmuitiemModel->checkExist("ID_NguoiDung",$userInfo["ID_NguoiDung"]);
        $this->view("frontend.dondangkytiem.update",[
            "dondangkyInfo" => $dondangkyInfo,
            "flag" => $flag
        ]);
    }
    public function update(){
        if(!empty($_POST)){
            $userInfo = $this->userModel->getInfoUser('SDT',$_GET['phone']);
            if(!isset($_POST["tiensu"])){
                $tiensuStr = "Không";
            }
            else{
                $tiensuStr = implode(", ",$_POST["tiensu"]);

            }
            $ngaymongmuon = $_POST["ngaymongmuon"];
            $muitiemthu = $_POST["muitiemthu"];
            $tinhTP = $_POST["province"];
            $quanHuyen = $_POST["district"];
            $phuongXa = $_POST["ward"];
            $uutien = $_POST["uutien"];
           
            $data = [
                        'NhomUuTien' => $uutien,
                        'TienSuBenh' => $tiensuStr,
                        'NgayMongMuon' => $ngaymongmuon,
                        'muitiemthu' => $muitiemthu,
                        'TinhTP' => $tinhTP,
                        'QuanHuyen' => $quanHuyen,
                        'XaPhuong' => $phuongXa,
                    ];
                $dondangkyInfo = $this->DondangkytiemModel->finByTwoValue("ID_NguoiDung",$userInfo['ID_NguoiDung'],"TrangThai",0);
            $this->DondangkytiemModel->updateData($dondangkyInfo["ID_DonDK"],$data);
            $this->tracuu("Cập nhật thành công !");     
        }

    }
    public function delete(){
        $userInfo = $this->userModel->getInfoUser('SDT',$_GET['phone']);
        $dondangkyInfo = $this->DondangkytiemModel->finByTwoValue("ID_NguoiDung",$userInfo['ID_NguoiDung'],"TrangThai",0);
        $this->DondangkytiemModel->deleteData($dondangkyInfo["ID_DonDK"]);
        header("location: ./index.php?controller=dondangkytiem&action=tracuu&phone=".$_GET['phone']."");


    }
    public function lichtiem(){
        $userInfo = $this->userModel->getInfoUser('SDT',$_GET['phone']);
        $dondangkyInfo = $this->DondangkytiemModel->getDiff("ID_NguoiDung",$userInfo["ID_NguoiDung"],"TrangThai",3);
        if($dondangkyInfo["TrangThai"] == 2){
            $phieutiemInfo = $this->phieutiemModel->getInfoPhieutiem("ID_DonDK",$dondangkyInfo["ID_DonDK"]);
            $dottiemInfo = $this->dottiemModel->findById($phieutiemInfo["ID_DotTC"]);
            $vaccineInfo = $this->vaccineModel->findById($dottiemInfo["ID_Vacxin"]);
            $donviInfo = $this->donviModel->findById($dottiemInfo["ID_DonVi"]);
    
            $this->view("frontend.dondangkytiem.phieutiem",[
                "phieutiemInfo" => $phieutiemInfo,
                "vaccineInfo" => $vaccineInfo,
                "donviInfo" => $donviInfo,
                "dondangkyInfo" => $dondangkyInfo,
                "flag" => true
            ]);
        }
        else{
            $this->view("frontend.dondangkytiem.phieutiem",[
                "flag" => false
            ]);
        }
    }
    public function hosotiemchung(){
        $userInfo = $this->userModel->getInfoUser('SDT',$_GET['phone']);
        $dondangkys = $this->DondangkytiemModel->finAllByTwoValue("ID_NguoiDung",$userInfo["ID_NguoiDung"],"TrangThai",3);
        $phieutiems = [];
        $dottiems = [];
        $donvis = [];
        $vaccines = [];
        $chitiets = [];


        foreach($dondangkys as $item){
            array_push($phieutiems,$this->phieutiemModel->getInfoPhieutiem("ID_DonDK",$item["ID_DonDK"]));
        }
        foreach($phieutiems as $item){
            array_push($dottiems,$this->dottiemModel->getInfoDottiem("ID_DotTC",$item["ID_DotTC"]));
            array_push($chitiets,$this->chitietmuitiemModel->getInfo("ID_phieu",$item["ID_phieu"]));
        }
        foreach($dottiems as $item){
            array_push($donvis,$this->donviModel->getInfoDonvi("ID_DonVi",$item["ID_DonVi"]));
            array_push($vaccines,$this->vaccineModel->getInfoVaccine("ID_Vacxin",$item["ID_Vacxin"]));
        }

        $this->view("frontend.dondangkytiem.hosotiemchung",[
            "dondangkys" => $dondangkys,
            "phieutiems" => $phieutiems,
            "donvis" => $donvis,
            "vaccines" => $vaccines,
            "chitiets" => $chitiets,
        ]);

    }
}
