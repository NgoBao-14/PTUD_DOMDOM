<?php
include_once('ketnoi.php');

class mChuyenKhoa
{
    public function getAllChuyenKhoa()
    {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if($con)
        {
            $query = "SELECT * FROM chuyenkhoa ORDER BY MaKhoa ASC";
            $result = $con->query($query);
            $p->dongketnoi($con);
            return $result;
        }
        else
        {
            return false;
        }
    }
}
?>