<?php
    include_once("ketnoi.php");
    class clsHoSo{
        public function select1HoSo($mabn){
            $p = new ketnoi();
            $conn=$p->moketnoi();
            $conn->set_charset("utf8");
            if($conn){
                $truyvan="select * from benhnhan where MaBN='$mabn'";
                $ketqua= $conn->query($truyvan);
                $p->dongketnoi($conn);
                return $ketqua;
            }
            else{
                return false;
            }
        }
    }
?>