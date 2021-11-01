<?php 
    class DonvitiemchungController extends BaseController{
        private $donviModel;
        private $nguoidungModel;
        private $roleModel;

        public function __construct()
        {
            $this->loadModel("DonvitiemchungModel");
            $this->donviModel = new DonvitiemchungModel();

            $this->loadModel("NguoidungModel");
            $this->nguoidungModel = new NguoidungModel();

            $this->loadModel("RoleModel");
            $this->roleModel = new RoleModel();
        }
        
        public function index(){
            $donvis = $this->donviModel->getAll();
            $nguoidungdaus = [];
            foreach($donvis as $item){
                array_push($nguoidungdaus,$this->nguoidungModel->findById($item["ID_NguoiDung"]));
            }
            return $this->view('frontend.donvitiemchung.index',[
                'donvis' => $donvis,
                'nguoidungdaus' => $nguoidungdaus,

            ]);
            
        }
        public function themdonvi($alert=""){
            $users = $this->nguoidungModel->getAll();
            return $this->view('frontend.donvitiemchung.add',[
                'alert' => $alert,
                'users' => $users
            ]);
        }

        public function store(){
            if(!empty($_POST)){
                $tendonvi = $_POST["tendonvi"];
                $sobantiem = $_POST["sobantiem"];
                $tinhTP = $_POST["province"];
                $quanHuyen = $_POST["district"];
                $phuongXa = $_POST["ward"];
                $idnguoidung = $_POST["quanly"];
                $data = [
                            'TenDonVi' => $tendonvi,
                            'ID_NguoiDung' => $idnguoidung,
                            'SoBanTiem' => $sobantiem,
                            'TinhTP' => $tinhTP,
                            'QuanHuyen' => $quanHuyen,
                            'XaPhuong' => $phuongXa,

                        ];
                if($this->donviModel->checkExist("TenDonVi",$tendonvi)){
                    $this->themdonvi('Tên đơn vị đã tồn tại');
                }
                else if($this->donviModel->checkExist("ID_NguoiDung",$idnguoidung)){
                    $this->themdonvi('Người quản lý đã tồn tại');
                }
                else{
                    $idnhomquyen = $this->roleModel->getInfoRole('TenNhomQuyen','Đơn vị tiêm chủng')['ID_NhomQuyen'];
                    $this->nguoidungModel->updateData($idnguoidung,['ID_NhomQuyen' => $idnhomquyen]);
                    $this->donviModel->store($data);
                    header("Location: ./index.php?controller=donvitiemchung");
                }
            }
        }
        public function suadonvi($alert=""){
            $id = $_GET['id'];
            $users = $this->nguoidungModel->getAll();
            $donvis = $this->donviModel->findById($id);
            
            return $this->view('frontend.donvitiemchung.update',[
                "donvis" => $donvis,
                'alert' => $alert,
                'users' => $users


            ]);
        }
        public function update(){
            if(!empty($_POST) && !empty($_GET)){
                $id = $_GET['id'];
                $tendonvi = $_POST["tendonvi"];
                $sobantiem = $_POST["sobantiem"];
                $tinhTP = $_POST["province"];
                $quanHuyen = $_POST["district"];
                $phuongXa = $_POST["ward"];
                $idnguoidung = $_POST["quanly"];
                $data = [
                            'TenDonVi' => $tendonvi,
                            'ID_NguoiDung' => $idnguoidung,
                            'SoBanTiem' => $sobantiem,
                            'TinhTP' => $tinhTP,
                            'QuanHuyen' => $quanHuyen,
                            'XaPhuong' => $phuongXa,

                        ];
                if($this->donviModel->checkExitsUpdate("TenDonVi",$tendonvi,$id)){
                    $alert = "Tên đơn vị đã tồn tại";
                    $this->suadonvi($alert);
                }
                else if($this->donviModel->checkExitsUpdate("ID_NguoiDung",$idnguoidung,$id)){
                    $this->suadonvi('Người quản lý đã tồn tại');
                }
                else{
                    $idnhomquyen = $this->roleModel->getInfoRole('TenNhomQuyen','Đơn vị tiêm chủng')['ID_NhomQuyen'];
                    $this->nguoidungModel->updateData($idnguoidung,['ID_NhomQuyen' => $idnhomquyen]);
                    $this->donviModel->updateData($id,$data);
                    header("Location: ./index.php?controller=donvitiemchung");
                }
            }

        }
        public function delete(){
            $id = $_GET['id'];
            $this->donviModel->deleteData($id);
            header("Location: ./index.php?controller=donvitiemchung");

        }
    }
