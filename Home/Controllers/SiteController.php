<?php
class SiteController extends BaseController{

    private $NguoidungModel;

    public function __construct()
    {
        $this->loadModel("NguoidungModel");
        $this->NguoidungModel = new NguoidungModel();
        
    }
    public function index(){
        return $this->view('frontend.site.index');
    }
    public function dangky(){
        return $this->view('frontend.register.index');
    }
    public function singup(){
         if(!empty($_POST)){
            $cmnd = $_POST['cmnd'];
            $fullname = $_POST['fullname'];
            $dob = $_POST['dob'];
            $gender = $_POST['gioitinh'];
            $email = $_POST["email"];
            $phone = $_POST['phone'];
            $PASS = $_POST['password'];
            $diachi = $_POST["diachi"];
            $quoctich = $_POST["quoctich"];
            $nghenghiep = $_POST["nghenghiep"];
            $dantoc = $_POST["dantoc"];
            $bhyt = $_POST["bhyt"];
            $data = [
                        'HoTen' => $fullname,
                        'MatKhau' => $PASS,
                        'CMND' => $cmnd,
                        'NgaySinh' => $dob,
                        'GioiTinh' => $gender,
                        'SDT' => $phone,
                        'Email' => $email,
                        'DiaChi' => $diachi,
                        'QuocTich' => $quoctich,
                        'NgheNghiep' => $nghenghiep,
                        'DanToc' => $dantoc,
                        'BHYT' => $bhyt,

                    ];
            if($this->NguoidungModel->checkExist("CMND",$cmnd)){
                return $this->view('frontend.register.index',["alert" => "Số CMND đã được đăng ký"]);
            }
            else if($this->NguoidungModel->checkExist("SDT",$phone)){
                return $this->view('frontend.register.index',["alert" => "Số điện thoại đã được đăng ký"]);
            }
            else if($this->NguoidungModel->checkExist("Email",$email)){
                return $this->view('frontend.register.index',["alert" => "Email đã được đăng ký"]);
            }
            else{
                $this->NguoidungModel->store($data);
                return $this->view('frontend.login.index',["success" => "Đăng ký thành công"]);
            }
        }
    }
    public function dangnhap(){
        return $this->view('frontend.login.index');
    }
    public function login(){
        if(!empty($_POST)){
           $phone = $_POST['phone'];
           $PASS = $_POST['password'];
           
            if(!$this->NguoidungModel->checkExist("SDT",$phone)){
                return $this->view('frontend.login.index',["alert" => "Số điện thoại chưa được đăng ký"]);
            }
            else if(!$this->NguoidungModel->checkExist("MatKhau",$PASS)){
                return $this->view('frontend.login.index',["alert" => "Mật khẩu không chính xác"]);
            }
            else {
                session_start();
                $_SESSION['phone'] = $phone;
                header("Location: ./index.php?controller=home");
            }
       }
    }

}
