<?php
    include("../../model/mQLBNhan.php");
    class cBNhan
    {
        public function getAllBNhan()
        {
            $p = new mBNhan();
            $tblBNhan = $p->getAllBNhan();
            if($tblBNhan)
            {
                if($tblBNhan->num_rows>0)
                {
                    return $tblBNhan;
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

        public function get1BNhan($mabn)
        {
            $p = new mBNhan();
            $tblBNhan = $p->get1BNhan($mabn);
            if($tblBNhan)
            {
                if($tblBNhan->num_rows>0)
                {
                    return $tblBNhan;
                }
                else
                {
                    return null;
                }
            }
            else{
                return false;
            }
        }

        public function getPKham($mabn)
        {
            $p = new mBNhan();
            $tblPKham = $p->getPKham($mabn);
            if($tblPKham)
            {
                if($tblPKham->num_rows>0)
                {
                    return $tblPKham;
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