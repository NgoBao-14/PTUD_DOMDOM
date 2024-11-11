<?php
    include("./model/mBacSi.php");
    class cbacsi
    {
        public function getAllBS()
        {
            $p = new Mbacsi();
            $tblBS = $p->getAllBacSi();
            if($tblBS)
            {
                if($tblBS->num_rows>0)
                {
                    return $tblBS;
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