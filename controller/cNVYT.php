<?php
    include("../../model/mNVYT.php");
    class cNVYT
    {
        public function getAllHD()
        {
            $p = new mNVYT();
            $tblNVYT = $p->getAllHD();
            if($tblNVYT)
            {
                if($tblNVYT->num_rows>0)
                {
                    return $tblNVYT;
                }
                else
                {
                    return -1;
                }
            }
            else
            {
                return false;
            }
        }
        public function getCTHD($id)
        {   
            $p = new mNVYT();
            $tblNVYT = $p->getCTHD($id);
            if($tblNVYT)
            {
                if($tblNVYT->num_rows>0)
                {
                    return $tblNVYT;
                }
                else
                {
                    return -1;
                }
            }
            else
            {
                return false;
            }
            
        }
    }

?>