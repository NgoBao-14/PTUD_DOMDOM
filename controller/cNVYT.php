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
        
        public function getAllNVYT()
        {
            $p = new mNVYT();
            $tblNVYT = $p->getAllNVYT();
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
            else{
                return false;
            }
        }
        
    public function getNVYT($MaNV)
    {   
        $p = new mNVYT();
        $tblNVYT = $p->getNVYT($MaNV);
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
    public function setInactive($MaNV)
        {
            $p = new mNVYT();
            return $p->setInactive($MaNV);
        }

        public function updateNVYT($MaNV, $NgaySinh, $GioiTinh, $SoDT, $Email)
        {
            $p = new mNVYT();
            return $p->updateNVYT($MaNV,  $NgaySinh, $GioiTinh, $SoDT, $Email);
        }
        public function addNVYT($HovaTen, $NgaySinh, $GioiTinh, $SoDT, $Email)
        {
            $p = new mNVYT();
            
            // Validate name (no special characters or numbers)
            if (!preg_match("/^[a-zA-ZÀ-ỹ\s]+$/", $HovaTen)) {
                return "Họ tên không hợp lệ. Vui lòng chỉ sử dụng chữ cái và khoảng trắng.";
            }

            // Check if phone number or email already exists
            if ($p->checkDuplicatePhoneOrEmail($SoDT, $Email)) {
                return "Số điện thoại hoặc email đã được sử dụng.";
            }

            // If all validations pass, add the new doctor
            return $p->addNVYT($HovaTen, $NgaySinh, $GioiTinh, $SoDT, $Email);
        }
        public function searchNVYT($searchTerm)
        {
            $p = new mNVYT();
            $tblNVYT = $p->searchNVYT($searchTerm);
            if($tblNVYT)
            {
                if(mysqli_num_rows($tblNVYT) > 0)
                {
                    return $tblNVYT;
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
