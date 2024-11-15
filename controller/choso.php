<?php
    include_once("model/hoso.php");
    class cHoSo{
        public function get1HoSo($mabn){
            $p=new clsHoSo();
            $tbl=$p->select1HoSo($mabn);
            if(mysqli_num_rows($tbl)>0){
                    return $tbl;
            }
            else{
                return false;
            }
        }
    }
?>