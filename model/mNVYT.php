<?php
    include_once('ketnoi.php');
    class mNVYT
    {
        public function getAllHD()
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'select * from hoadon as h join chitiethoadon as hd on h.MaHD = hd.MaHD 
                                                  join benhnhan as b on h.MaBN=b.MaBN 
                                                  join phuongthucthanhtoan as t on h.MaPTTT = t.MaPTTT
                                                  order by h.MaHD desc';
                $tblNVYT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVYT;
            }
            else
            {
                return false;
            }
     
        }
        public function getCTHD($MaHD)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'SELECT *
                            FROM hoadon AS h
                            JOIN chitiethoadon AS hd ON h.MaHD = hd.MaHD
                            JOIN benhnhan AS b ON h.MaBN = b.MaBN
                            WHERE h.MaHD = '.$MaHD.'
                            ORDER BY h.MaHD DESC';
                $tblNVYT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVYT;
            }
            else
            {
                return false;
            }
        }
        public function setPTTT($MaHD,$PT)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'UPDATE hoadon SET MaPTTT = '.$PT.' WHERE MaHD = '.$MaHD.' LIMIT 1';
                $tblNVYT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVYT;
            }
        }
        public function loadPTTT()
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {   
                $str = 'SELECT * FROM phuongthucthanhtoan WHERE MaPTTT > 0';
                $tblNVYT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVYT;
            }
        }
        public function setTrangThai($MaHD,$TT)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'UPDATE hoadon SET TrangThai = '.$TT.' WHERE MaHD = '.$MaHD.' LIMIT 1';
                $tblNVYT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVYT;
            }
        }
    }

?>