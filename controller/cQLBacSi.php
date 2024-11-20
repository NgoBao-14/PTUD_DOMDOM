<?php
include("../../model/mBacSi.php");
class cbacsi
{
    private $model;

    public function __construct()
    {
        $this->model = new Mbacsi();
    }

    public function getAllBS()
    {
        return $this->model->getAllBacSi();
    }
    
    public function getBS($MaNV)
    {   
        return $this->model->getBS($MaNV);
    }

    public function setInactive($MaNV)
    {
        return $this->model->setInactive($MaNV);
    }

    public function updateBS($MaNV, $MaKhoa, $NgaySinh, $GioiTinh, $SoDT, $EmailNV)
    {
        // Validate phone number and email
        if ($this->model->checkDuplicatePhoneOrEmail($SoDT, $EmailNV, $MaNV)) {
            return "Số điện thoại hoặc email đã được sử dụng bởi bác sĩ khác.";
        }

        return $this->model->updateBS($MaNV, $MaKhoa, $NgaySinh, $GioiTinh, $SoDT, $EmailNV);
    }

    public function addBS($HovaTenNV, $NgaySinh, $GioiTinh, $SoDT, $EmailNV, $MaKhoa)
    {
        // Validate name (no special characters or numbers)
        if (!preg_match("/^[a-zA-ZÀ-ỹ\s]+$/u", $HovaTenNV)) {
            return "Họ tên không hợp lệ. Vui lòng chỉ sử dụng chữ cái và khoảng trắng.";
        }

        // Check if phone number or email already exists
        if ($this->model->checkDuplicatePhoneOrEmail($SoDT, $EmailNV)) {
            return "Số điện thoại hoặc email đã được sử dụng.";
        }

        // If all validations pass, add the new doctor
        return $this->model->addBS($HovaTenNV, $NgaySinh, $GioiTinh, $SoDT, $EmailNV, $MaKhoa);
    }

    public function checkPhoneExists($phone)
    {
        return $this->model->checkPhoneExists($phone);
    }

    public function checkEmailExists($emailNV)
    {
        return $this->model->checkEmailExists($emailNV);
    }
}
?>