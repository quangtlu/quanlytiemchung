<?php

class DonvitiemchungModel extends BaseModel {
    const TABLE = 'donvitiemchung';
    const TABLE2 = 'dondangkytiemchung';


    public function getAll($select = ['*'],$orderBys = [''],$limit = 15){
        return $this->all(self::TABLE,$select,$orderBys,$limit);
    }
    public function getTwoTable($col1,$col2,$col3,$column,$value){
        return $this->getTwo(self::TABLE,self::TABLE2,$col1,$col2,$col3,$column,$value);
    }
    public function findById($id){
        return $this->find(self::TABLE,$id);
    }
    public function store($data){
        $this->create(self::TABLE,$data);
    }
    public function updateData($id,$data){
        $this->update(self::TABLE,$id,$data);
    }
    public function deleteData($id){
        $this->destroy(self::TABLE,$id);
    }
    public function checkExist($column,$value){
        return $this->isExist(self::TABLE,$column,$value);
    }
    public function getInfoDonvi($col,$value){
        return $this->findBy(self::TABLE,$col,$value);
    }
    public function checkExitsUpdate($column,$value,$id){
        return $this->isExistUpdate(self::TABLE,$column,$value,$id);
    }
    public function getAllInfo($col,$value){
        return $this->findAllBy(self::TABLE,$col,$value);
    }
}