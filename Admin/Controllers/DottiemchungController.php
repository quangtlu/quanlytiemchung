<?php 
    class DottiemchungController extends BaseController{
        private $dottiemModel;
        private $vaccineModel;
        private $donviModel;
        private $userModel;

        public function __construct()
        {
            $this->loadModel("DottiemchungModel");
            $this->dottiemModel = new DottiemchungModel();
            $this->loadModel("VaccineModel");
            $this->vaccineModel = new VaccineModel();
            $this->loadModel("DonvitiemchungModel");
            $this->donviModel = new DonvitiemchungModel();
            $this->loadModel("NguoidungModel");
            $this->userModel = new NguoidungModel();


        }
        
        public function index(){
            session_start();
            $phone =$_SESSION['admin'];
            $idnguoidung = $this->userModel->getInfoUser("SDT",$phone)["ID_NguoiDung"];
            $iddonvi = $this->donviModel->getInfoDonvi("ID_NguoiDung",$idnguoidung)["ID_DonVi"];

            $dottiems = $this->dottiemModel->getAllInfo("ID_DonVi",$iddonvi);
            $vaccines = [];
            foreach($dottiems as $item){
                array_push($vaccines,$this->vaccineModel->findById($item["ID_Vacxin"]));
            }        
            return $this->view('frontend.dottiemchung.index',[
                "dottiems" => $dottiems,
                "vaccines" => $vaccines,
            ]);

        }
        public function themmoi($alert=""){
            $vaccines = $this->vaccineModel->getAll();
            return $this->view('frontend.dottiemchung.add',[
                "alert" => $alert,
                "vaccines" => $vaccines,
            ]);
  
        }
        public function store(){
            if(!empty($_POST)){
                $phone =$_GET["phone"];
                $idnguoidung = $this->userModel->getInfoUser("SDT",$phone)["ID_NguoiDung"];
                $iddonvi = $this->donviModel->getInfoDonvi("ID_NguoiDung",$idnguoidung)["ID_DonVi"];
                $tenvacxin = $_POST["tenvacxin"];

                $idvacxin = $this->vaccineModel->getInfoVaccine("TenVacxin",$tenvacxin)["ID_Vacxin"];
                $tendot = $_POST["tendot"];
                $ngaybd = $_POST["ngaybd"];
                $ngaykt = $_POST["ngaykt"];
                $soluong = $_POST["soluong"];
                $data = [
                            'TenDotTC' => $tendot,
                            'ID_DonVi' => $iddonvi,
                            'SoLuong' => $soluong,
                            'NgayBD' => $ngaybd,
                            'NgayKT' => $ngaykt,
                            'ID_Vacxin' => $idvacxin,
                            'ID_DonVi' => $iddonvi
                        ];
                if($this->dottiemModel->checkExitsbyValue("TenDotTC",$tendot,"ID_DonVi",$iddonvi)){
                    $this->themmoi("Tên đợt tiêm chủng đã tồn tại");
                }
                else if($this->dottiemModel->checkExitsbyValue("NgayBD",$ngaybd,"ID_DonVi",$iddonvi) && $this->dottiemModel->checkExist("NgayKT",$ngaykt,"ID_DonVi",$iddonvi)){
                    $this->themmoi("Ngày bắt đầu và kết thúc trùng với đợt tiêm khác");
                }
                else{
                    $this->dottiemModel->store($data);
                    header("Location: ./index.php?controller=dottiemchung");
                }
            }
        }
        public function chitiet(){
            if(!empty($_GET)){
                $id = $_GET['id'];
                $dottiemchungs = $this->dottiemModel->findById($id);
                $donvis = $this->donviModel->getInfoDonvi("ID_DonVi",$dottiemchungs["ID_DonVi"]);
                $vaccines = $this->vaccineModel->getInfoVaccine("ID_Vacxin",$dottiemchungs["ID_Vacxin"]);
                return $this->view('frontend.dottiemchung.detail',[
                    "dottiemchungs" => $dottiemchungs,
                    "donvis" => $donvis,
                    "vaccines" => $vaccines
                ]);
            }
        }
        public function edit($alert=""){
            if(!empty($_GET)){
                $id = $_GET['id'];
                $dottiemchungs = $this->dottiemModel->findById($id);
                $donvis = $this->donviModel->getInfoDonvi("ID_DonVi",$dottiemchungs["ID_DonVi"]);
                $vaccine = $this->vaccineModel->getInfoVaccine("ID_Vacxin",$dottiemchungs["ID_Vacxin"]);
                $vaccineList = $this->vaccineModel->getAll();
                return $this->view('frontend.dottiemchung.update',[
                    "alert" => $alert,
                    "dottiemchungs" => $dottiemchungs,
                    "donvis" => $donvis,
                    "vaccine" => $vaccine,
                    "vaccineList" => $vaccineList,
                    "id" => $id
                ]);
            }
        }
        public function update(){
            if(!empty($_POST)){
                $id = $_GET["id"];
                $tenvacxin = $_POST["tenvacxin"];
                $idvacxin = $this->vaccineModel->getInfoVaccine("TenVacxin",$tenvacxin)["ID_Vacxin"];
                $tendot = $_POST["tendot"];
                $ngaybd = $_POST["ngaybd"];
                $ngaykt = $_POST["ngaykt"];
                $soluong = $_POST["soluong"];
                $data = [
                            'TenDotTC' => $tendot,
                            'SoLuong' => $soluong,
                            'NgayBD' => $ngaybd,
                            'NgayKT' => $ngaykt,
                            'ID_Vacxin' => $idvacxin,
                        ];
                if($this->dottiemModel->checkExitsUpdate("TenDotTC",$tendot,$id)){
                    $this->edit("Tên đợt tiêm chủng đã tồn tại");
                }
                else if($this->dottiemModel->checkExitsUpdate("NgayBD",$ngaybd,$id) && $this->dottiemModel->checkExist("NgayKT",$ngaykt,$id)){
                    $this->edit("Ngày bắt đầu và kết thúc trùng với đợt tiêm khác");
                }
                else{
                    $this->dottiemModel->updateData($id,$data);
                    header("Location: ./index.php?controller=dottiemchung");
                }
            }
        }
        public function delete(){
            $id = $_GET['id'];
            $this->dottiemModel->deleteData($id);
            header("Location: ./index.php?controller=dottiemchung");

        }
        
 
    }
