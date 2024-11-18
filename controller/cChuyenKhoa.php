<?php
include("../../model/mChuyenKhoa.php");

class cChuyenKhoa
{
    public function getAllChuyenKhoa()
    {
        $p = new mChuyenKhoa();
        $result = $p->getAllChuyenKhoa();
        if($result)
        {
            if($result->num_rows > 0)
            {
                return $result;
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