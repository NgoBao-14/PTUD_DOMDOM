<?php
    include("../../model/mKhoa.php");
    class cKhoa
    {
        public function getAllKhoa()
        {
            $p = new mKhoa();
            $tblKhoa = $p->getAllKhoa();
            if($tblKhoa)
            {
                if($tblKhoa->num_rows>0)
                {
                    return $tblKhoa;
                }
                else
                {
                    return -1;
                }
            }
            else{
                return false;
            }
        }
    }
?>