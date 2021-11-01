<?php

class DondangkytiemModel extends BaseModel {
    const TABLE = 'dondangkytiemchung';

    public function getAll($select = ['*'],$orderBys = [''],$limit = 15){
        return $this->all(self::TABLE,$select,$orderBys,$limit);
    }

    public function store($data){
        $this->create(self::TABLE,$data);
    }
    public function checkExist($column,$value){
        return $this->isExist(self::TABLE,$column,$value);
    }
    public function checkExitsUpdate($column,$value,$id){
        return $this->isExistUpdate(self::TABLE,$column,$value,$id);
    }
    public function findById($id){
        return $this->find(self::TABLE,$id);
    }
    public function updateData($id,$data){
        $this->update(self::TABLE,$id,$data);
    }
    public function deleteData($id){
        $this->destroy(self::TABLE,$id);
    }
    public function getInfoDondangky($col,$value){
        return $this->findBy(self::TABLE,$col,$value);
    }
    public function finByTwoValue($col1,$val1,$col2,$val2){
        return $this->getByTwoCondition(self::TABLE,$col1,$val1,$col2,$val2);
    }
    public function finAllByTwoValue($col1,$val1,$col2,$val2){
        return $this->finAllByTwo(self::TABLE,$col1,$val1,$col2,$val2);
    }
    public function getAllInfo($col,$value){
        return $this->findAllBy(self::TABLE,$col,$value);
    }
    public function getDiff($col1,$val1,$col2,$val2){
        return $this->findDiff(self::TABLE,$col1,$val1,$col2,$val2);
    }

    public function getMax($maxcol,$col,$value){
        return $this->findMax(self::TABLE,$maxcol,$col,$value);
    }

    public function getUserInfoDaTiem($tendonvi){
        $sql = "
            SELECT
                nd.HoTen,nd.CMND,nd.GioiTinh,nd.NgaySinh,nd.SDT,nd.Email,nd.DiaChi
            FROM
                nguoidung as nd
            WHERE
                ID_NguoiDung IN(
                SELECT DISTINCT
                    dk.ID_NguoiDung
                FROM
                    dondangkytiemchung AS dk
                JOIN donvitiemchung AS dv
                ON
                    (
                        dv.TinhTP = dk.TinhTP AND dv.QuanHuyen = dk.QuanHuyen AND dv.XaPhuong = dk.XaPhuong AND dv.TenDonVi = '".$tendonvi."'
                    )
                WHERE
                    TrangThai = 3
            )  AND ID_NguoiDung IN(
                SELECT
                    ID_NguoiDung
                FROM
                    chitietmuitiem

                
            )
        ";
        $query = $this->_query($sql);
        $data = [];
        while($row =  mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return $data;

    }


    public function count($trangthai,$tendonvi,$ngaybd='0001-01-01',$ngaykt='9999-12-31'){
        $sql = "SELECT dv.TenDonVi as tendonvi,count(dk.ID_DonDK) as soluong from dondangkytiemchung as dk
        JOIN donvitiemchung as dv on (dv.TinhTP = dk.TinhTP AND  dv.QuanHuyen = dk.QuanHuyen AND  dv.XaPhuong = dk.XaPhuong)
        where  dk.NgayDK >= '".$ngaybd."' AND dk.NgayDK <= '".$ngaykt."'  and dk.TrangThai = $trangthai and dv.TenDonVi = '".$tendonvi."'
        group by dv.TenDonVi
        ";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
        
    }
    public function countAge($tendonvi,$from=0,$to=200,$ngaybd='0001-01-01',$ngaykt='9999-12-31'){
        $sql = "
        SELECT
            COUNT(ID_NguoiDung) as soluong
        FROM
            nguoidung 
        WHERE
            ID_NguoiDung IN(
            SELECT DISTINCT
                dk.ID_NguoiDung
            FROM
                dondangkytiemchung AS dk
            JOIN donvitiemchung AS dv
            ON
                (
                    dv.TinhTP = dk.TinhTP AND dv.QuanHuyen = dk.QuanHuyen AND dv.XaPhuong = dk.XaPhuong AND dv.TenDonVi = '".$tendonvi."'
                )
            WHERE
                TrangThai = 3
        ) AND TIMESTAMPDIFF(YEAR, NgaySinh, CURDATE()) >= '".$from."' AND TIMESTAMPDIFF(YEAR, NgaySinh, CURDATE()) <= '".$to."' AND ID_NguoiDung IN(
            SELECT
                ID_NguoiDung
            FROM
                chitietmuitiem
            WHERE
                ID_phieu IN(
                SELECT
                    ID_phieu
                FROM
                    phieutiem
                WHERE
                    NgayTiem >= '".$ngaybd."' AND NgayTiem <= '".$ngaykt."'
            )
        )
        ";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);

    }
    public function countMuitiem($tendonvi,$muitiemthu,$ngaybd='0001-01-01',$ngaykt='9999-12-31'){
        $sql = "SELECT
                    COUNT(ID_NguoiDung) AS soluong
                FROM
                    nguoidung
                WHERE
                    ID_NguoiDung IN(
                    SELECT DISTINCT
                        dk.ID_NguoiDung
                    FROM
                        dondangkytiemchung AS dk
                    JOIN donvitiemchung AS dv
                    ON
                        (
                            dv.TinhTP = dk.TinhTP AND dv.QuanHuyen = dk.QuanHuyen AND dv.XaPhuong = dk.XaPhuong AND dv.TenDonVi = '".$tendonvi."'
                        )
                    WHERE
                        TrangThai = 3 AND dk.MuiTiemThu = '".$muitiemthu."' AND dk.ID_NguoiDung IN(
                        SELECT
                            ID_NguoiDung
                        FROM
                            chitietmuitiem
                        WHERE
                            ID_phieu IN(
                            SELECT
                                ID_phieu
                            FROM
                                phieutiem
                            WHERE
                                NgayTiem >= '".$ngaybd."' AND NgayTiem <= '".$ngaykt."' 
                        )
                    )
                )
        ";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }
    public function countVaccine($tendonvi,$tenvacxin,$ngaybd='0001-01-01',$ngaykt='9999-12-31'){
        $sql = "
            SELECT
                COUNT(ID_NguoiDung) AS soluong
            FROM
                nguoidung
            WHERE
                ID_NguoiDung IN(
                SELECT DISTINCT
                    dk.ID_NguoiDung
                FROM
                    dondangkytiemchung AS dk
                JOIN donvitiemchung AS dv
                ON
                    (
                        dv.TinhTP = dk.TinhTP AND dv.QuanHuyen = dk.QuanHuyen AND dv.XaPhuong = dk.XaPhuong AND dv.TenDonVi = '".$tendonvi."'
                    )
                WHERE 
                    dk.ID_NguoiDung IN(
                    SELECT
                        ID_NguoiDung
                    FROM
                        chitietmuitiem
                    WHERE
                        ID_phieu IN(
                        SELECT
                            ID_phieu
                        FROM
                            phieutiem
                        WHERE
                            NgayTiem >= '".$ngaybd."' AND NgayTiem <= '".$ngaykt."' AND ID_DotTC IN(
                            SELECT
                                ID_DotTC
                            FROM
                                dottiemchung
                            WHERE
                                ID_Vacxin IN(
                                SELECT
                                    ID_Vacxin
                                FROM
                                    vacxin
                                WHERE
                                    TenVacxin = '".$tenvacxin."'
                            )
                        )
                    )
                )
            )
        ";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

}