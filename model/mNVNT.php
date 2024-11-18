<?php
    include_once('ketnoi.php');
    class mNVNT
    {
        public function getALLDT()
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'SELECT *
                        FROM donthuoc AS d
                        JOIN benhnhan AS b ON d.MaBN = b.MaBN
                        ORDER by d.MaDT desc';
                $tblNVNT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVNT;
            }
            else
            {
                return false;
            }
        }
        public function getCTDT($MaDT)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'SELECT *
                        FROM donthuoc AS d
                        JOIN chitietdonthuoc AS dt ON d.MaDT = dt.MaDT
                        JOIN benhnhan AS b ON d.MaBN = b.MaBN
                        JOIN bacsi AS bs ON d.MaBS = bs.MaNV
                        JOIN nhanvien AS nv ON bs.MaNV = nv.MaNV
                        WHERE d.MaDT = '.$MaDT.'
                        ORDER by d.MaDT desc
                        LIMIT 1';
                $tblNVNT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVNT;
            }
            else
            {
                return false;
            }
        }
        public function getThuoc($MaDT)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'SELECT *
                        FROM donthuoc AS d
                        JOIN chitietdonthuoc AS dt ON d.MaDT = dt.MaDT
                        JOIN thuoc as t ON dt.MaThuoc = t.MaThuoc
                        WHERE d.MaDT = '.$MaDT.'
                        ORDER by d.MaDT desc';
                $tblNVNT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVNT;
            }
            else
            {
                return false;
            }
        }
        public function setTT($MaDT,$TT)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'UPDATE donthuoc 
                        SET TrangThai = '.$TT.'
                        WHERE MaDT = '.$MaDT.'
                        LIMIT 1';
                $tblNVNT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVNT;
            }
            else
            {
                return false;
            }
        }
    }


?>