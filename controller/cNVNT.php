<?php
    include("../../model/mNVNT.php");
    class cNVNT
    {
        public function getALLDT()
        {
            $p = new mNVNT();
            $tblNVNT = $p->getALLDT();
            if($tblNVNT)
            {
                if($tblNVNT->num_rows>0)
                {
                    return $tblNVNT;
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
        public function getCTDT($MaDT)
        {
            $p = new mNVNT();
            $tblNVNT = $p->getCTDT($MaDT);
            if($tblNVNT)
            {
                if($tblNVNT->num_rows>0)
                {
                    return $tblNVNT;
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
        public function getThuoc($MaDT)
        {
            $p = new mNVNT();
            $tblNVNT = $p->getThuoc($MaDT);
            if($tblNVNT)
            {
                if($tblNVNT->num_rows>0)
                {
                    return $tblNVNT;
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
        public function setTT($MaDT,$TT)
        {
            $p = new mNVNT();
            $tblNVNT = $p->setTT($MaDT,$TT);
            if($tblNVNT)
            {
                if($tblNVNT->num_rows>0)
                {
                    return $tblNVNT;
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