<?php
include("../../model/mQLNVYT.php");
class cQLNVYT
{
    private $model;

    public function __construct()
    {
        $this->model = new mNVYT();
    }

    public function getAllNVYT()
    {
        return $this->model->getAllNVYT();
    }
    
    public function getNVYT($MaNV)
    {   
        return $this->model->getNVYT($MaNV);
    }

    public function setInactive($MaNV)
    {
        return $this->model->setInactive($MaNV);
    }

    public function updateNVYT($MaNV, $NgaySinh, $GioiTinh, $SoDT, $EmailNV)
    {
        $existingNurse = $this->model->getNVYT($MaNV);
        if ($existingNurse && $existingNurse !== -1) {
            $existingNurse = $existingNurse->fetch_assoc();
            if ($existingNurse['SoDT'] !== $SoDT || $existingNurse['EmailNV'] !== $EmailNV) {
                $duplicate = $this->model->checkDuplicatePhoneOrEmail($SoDT, $EmailNV);
                if ($duplicate) {
                    return "Số điện thoại hoặc email đã được sử dụng bởi nhân viên y tế khác.";
                }
            }
        }

        return $this->model->updateNVYT($MaNV, $NgaySinh, $GioiTinh, $SoDT, $EmailNV);
    }

    public function addNVYT($HovaTenNV, $NgaySinh, $GioiTinh, $SoDT, $EmailNV)
    {
        if (!preg_match("/^[a-zA-ZÀ-ỹ\s]+$/u", $HovaTenNV)) {
            return "Họ tên không hợp lệ. Vui lòng chỉ sử dụng chữ cái và khoảng trắng.";
        }

        $duplicate = $this->model->checkDuplicatePhoneOrEmail($SoDT, $EmailNV);
        if ($duplicate) {
            return "Số điện thoại hoặc email đã được sử dụng.";
        }

        $result = $this->model->addNVYT($HovaTenNV, $NgaySinh, $GioiTinh, $SoDT, $EmailNV);
        if ($result === true) {
            return true;
        } else {
            return "Có lỗi xảy ra khi thêm nhân viên y tế. Vui lòng thử lại.";
        }
    }
}
?>