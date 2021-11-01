<?php

class PhieutiemchungModel extends BaseModel {
    const TABLE = 'phieutiem';
    const TABLE2 = 'dottiemchung';


    public function getAll($select = ['*'],$orderBys = [''],$limit = 15){
        return $this->all(self::TABLE,$select,$orderBys,$limit);
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
    public function findByCondition($col,$value){
        return $this->findBy(self::TABLE,$col,$value);
    }
    public function checkExist($column,$value){
        return $this->isExist(self::TABLE,$column,$value);
    }

    public function getInfoPhieutiem($col,$value){
        return $this->findBy(self::TABLE,$col,$value);
    }
    public function checkExitsUpdate($column,$value,$id){
        return $this->isExistUpdate(self::TABLE,$column,$value,$id);
    }
    public function getAllInfo($col,$value){
        return $this->findAllBy(self::TABLE,$col,$value);
    }
    public function findByTwoCondition($col1,$val1,$condition,$col2,$val2){
        return $this->getByConditionFromTwo(self::TABLE,self::TABLE2,$col1,$val1,$condition,$col2,$val2);
    }
}