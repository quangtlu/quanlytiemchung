<?php

class BaseController
{
    const VIEWS_FOLDER_NAME = '../Admin/Views';
    const MODELS_FOLDER_NAME = '../Home/Models';

    // quy tắc 
    // + pathname: folderName.file name
    // + Lấy từ thư mục sau thư mục Views
    // VD: frontend.product.index
    public function view($viewPath, array $data = [])
    {
        foreach($data as $key => $value){
            $$key = $value;
        }
        
         require(self::VIEWS_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath) . '.php');
    }

    protected function loadModel($modelPath){

        require(self::MODELS_FOLDER_NAME . '/' . $modelPath . '.php');

    }
}
