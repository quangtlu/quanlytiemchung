<?php
class HomeController extends BaseController{
    public function index(){
       return $this->view('frontend.home.index');
    }
    public function logout(){
        session_start();
        unset($_SESSION["phone"]);
        header("Location: ./index.php?controller=site");
     }
}
