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
        
        public function getBS($MaNV)
        {   
            $p = new mBacSi();
            $tblBS = $p->getBS($MaNV);
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
            else
            {
                return false;
            }
            
        }
        public function setInactive($MaNV)
        {
            $p = new mBacSi();
            return $p->setInactive($MaNV);
        }

        public function updateBS($MaNV, $MaKhoa, $NgaySinh, $GioiTinh, $SoDT, $Email)
        {
            $p = new mBacSi();
            return $p->updateBS($MaNV, $MaKhoa, $NgaySinh, $GioiTinh, $SoDT, $Email);
        }
        public function addBS($HovaTen, $NgaySinh, $GioiTinh, $SoDT, $Email, $MaKhoa)
        {
            $p = new mBacSi();
            
            // Validate name (no special characters or numbers)
            if (!preg_match("/^[a-zA-ZÀ-ỹ\s]+$/", $HovaTen)) {
                return "Họ tên không hợp lệ. Vui lòng chỉ sử dụng chữ cái và khoảng trắng.";
            }

            // Check if phone number or email already exists
            if ($p->checkDuplicatePhoneOrEmail($SoDT, $Email)) {
                return "Số điện thoại hoặc email đã được sử dụng.";
            }

            // If all validations pass, add the new doctor
            return $p->addBS($HovaTen, $NgaySinh, $GioiTinh, $SoDT, $Email, $MaKhoa);
        }
    }

?>
