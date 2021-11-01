<?php
class BaseModel extends Database{
    protected $connect;
    public function __construct()
    {
        $this->connect = $this->connect();
    }
    
    // Lấy tất cả các bản ghi
    public function all($table,$select = ['*'],$orderBys = [],$limit = 1000){

        $column = implode(',',$select);
        $orderByString = implode(' ',$orderBys);
        
        if($orderByString){
            $sql = "SELECT $column FROM $table ORDER BY $orderByString LIMIT $limit";
        }
        else{
            $sql = "SELECT $column FROM $table  LIMIT $limit";
        }
        $query = $this->_query($sql);
        $data = [];
        while($row =  mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return $data;

    }
    // Lấy ra 1 bản ghi trong bảng
    public function find($table,$id){
        $PrimaryKey = $this->_getPK($table);
        $sql = "SELECT * FROM $table WHERE $PrimaryKey = $id";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
        
    }
    // Lấy ra 1 bản ghi nếu có column = value
    public function findBy($table,$col,$value){
        $sql = "SELECT * FROM $table WHERE $col = '".$value."'";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
        
    }
     // Lấy ra giá trị max của 1 column với 1 điều kiện
     public function findMax($table,$maxcol,$col,$value){
        $sql = "SELECT MAX($maxcol) as max FROM $table WHERE $col = '".$value."'";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
        
    }
    // Lấy ra tất cả bản ghi nếu có column = value
    public function findAllBy($table,$col,$value){
        $sql = "SELECT * FROM $table WHERE $col = '".$value."'";
        $query = $this->_query($sql);
        $data = [];
        while($row =  mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return $data;
        
    }
    // Lấy ra tất cả bản ghi nếu có col1 = val1 and col2 = val2
    public function finAllByTwo($table,$col1,$val1,$col2,$val2){
        $sql = "SELECT * FROM $table WHERE $col1 = '".$val1."' AND $col2 = '".$val2."'";
        $query = $this->_query($sql);
        $data = [];
        while($row =  mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return $data;
        
    }
    // Lấy ra tất cả bản ghi nếu có col1 = val1 col2 != val2
    public function findDiff($table,$col1,$val1,$col2,$val2){
        $sql = "SELECT * FROM $table WHERE $col1 = '".$val1."' AND $col2 != '".$val2."'";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
        
    }
    // Lấy tất cả bảng ghi điều kiện từ 2 bảng
    public function getByConditionFromTwo($table1,$table2,$col1,$val1,$condition,$col2,$val2){
        $sql = "SELECT * FROM $table1 WHERE $col1 = $val1 AND $condition IN (SELECT $condition from $table2 WHERE $col2 = $val2)";
        $query = $this->_query($sql);
        $data = [];
        while($row =  mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return $data;
    }
     // Lấy 1 bản ghi với điện kiện IN và WHERE từ 2 bảng
     public function getByOneCondition($table1,$table2,$condition,$col,$val){
        $sql = "SELECT * FROM $table1 WHERE  $condition IN (SELECT $condition from $table2 WHERE $col = $val)";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);

    }
    // Lấy ra bản ghi với 2 điều kiện trong cùng 1 bảng

    public function getByTwoCondition($table,$col1,$val1,$col2,$val2){
        $sql = "SELECT * FROM $table WHERE $col1 = $val1 and $col2 = $val2";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);

    }
    // Lấy ra các bản ghi từ 2 bảng
    public function getTwo($table1,$table2,$col1,$col2="",$col3="",$column,$value){
        $sql = "SELECT * FROM $table1 as t1 JOIN $table2 as t2 on (
                            t1.$col1 = t2.$col1 AND
                            t1.$col2 = t2.$col2 AND
                            t1.$col3 = t2.$col3 )
                         WHERE $column = $value";
        $query = $this->_query($sql);
        $data = [];
        while($row =  mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return $data;
    }


    // Kiểm tra tồn tại của bản ghi nếu bản ghi đó có column = value
    public function isExist($table,$column,$value){
        $sql = "SELECT * FROM $table WHERE $column = '".$value."'";
        $query = $this->_query($sql);
        if($query){
            if(mysqli_num_rows($query)>0){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            echo "Lỗi truy vấn";
        }
    }

    // Kiểm tra tồn tại của bản ghi, ngoại trừ chính nó khi update
    public function isExistUpdate($table,$column,$value,$id){
        $PrimaryKey = $this->_getPK($table);
        $sql = "SELECT * FROM $table WHERE $column = '".$value."' and $PrimaryKey != '".$id."'";
        $query = $this->_query($sql);
        if($query){
            if(mysqli_num_rows($query)>0){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            echo "Lỗi truy vấn";
        }
    }
    // Kiểm tra tồn tại của bản ghi, ngoại trừ column = value
    public function isExistValue($table,$column1,$value1,$column2,$value2){
        $sql = "SELECT * FROM $table WHERE $column1 = '".$value1."' AND $column2 = '".$value2."'";
        $query = $this->_query($sql);
        if($query){
            if(mysqli_num_rows($query)>0){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            echo "Lỗi truy vấn";
        }
        echo $sql;
    }
    // Thêm dữ liệu vào bảng
    public function create($table,$data = []){

        $columns =  implode(',',array_keys($data));

        $newValues = array_map(function($value){
            return "'".$value."'";
        },array_values($data));

        $newValues =  implode(',',array_values($newValues));
        
        $sql = "INSERT INTO $table($columns) values($newValues)";
        $this->_query($sql);
    }
    // Sửa dữ liệu trong bảng
    public function update($table,$id,$data){
        $PrimaryKey = $this->_getPK($table);
        
        $dataSets = [];
        foreach($data as $key => $val){
            array_push($dataSets,"${key} = '".$val."'");
        }
        $dataSetString = implode(',', $dataSets);

        $sql = "UPDATE $table SET $dataSetString WHERE $PrimaryKey = $id";
        $this->_query($sql);
    }
    // Xóa dữ liệu trong bảng
    public function destroy($table,$id){
        $PrimaryKey = $this->_getPK($table);
        
        $sql = "DELETE FROM $table WHERE $PrimaryKey = $id";
        $this->_query($sql);

    }
    

    // Hàm lấy tên khóa chính của 1 bảng
    public function _getPK($table){
        $sqlID = "SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
        WHERE TABLE_NAME = '$table'
        AND CONSTRAINT_NAME = 'PRIMARY'";

        $queryGetID = $this->_query($sqlID);
        $arrayPK = [];
        while($row =  mysqli_fetch_assoc($queryGetID)){
            array_push($arrayPK,$row);
        }
        return  $arrayPK[0]["COLUMN_NAME"];
    }
    // Hàm thực hiện câu truy vấn
    public function _query($sql){
        return mysqli_query($this->connect(),$sql);
    }
}
