<?php
    include_once("ketnoi.php");
    class NguoiDung {
        public function selectNguoiDung($user,$pass){
            $p= new ketnoi();
            $con=$p->moketnoi();
            $truyvan = "SELECT tk.ID, tk.username, tk.password, tk.phanquyen, bn.SoDT, bn.MaBN, bn.HovaTen, 'benhnhan' AS role 
            FROM taikhoan tk 
            JOIN benhnhan bn ON tk.ID = bn.ID 
            WHERE bn.SoDT = '$user' AND tk.password = '$pass'
            UNION
            SELECT tk.ID, tk.username, tk.password, tk.phanquyen, ql.SoDT, ql.MaQL, ql.HovaTen, 'quanly' AS role 
            FROM taikhoan tk 
            JOIN quanly ql ON tk.ID = ql.ID 
            WHERE ql.SoDT = '$user' AND tk.password = '$pass'
            UNION
            SELECT tk.ID, tk.username, tk.password, tk.phanquyen, nv.SoDT, nv.MaNV, nv.HovaTen, 'quanly' AS role 
            FROM taikhoan tk 
            JOIN nhanvien nv ON tk.ID = nv.ID 
            WHERE nv.SoDT = '$user' AND tk.password = '$pass'";
            $ketqua=mysqli_query($con,$truyvan);
            $p->dongketnoi($con);
            return $ketqua;
        }
        public function DangKy($Username, $Password, $Phanquyen){
            $p = new ketnoi();
            $truyvan="INSERT INTO taikhoan(username, password, phanquyen) VALUES('$Username', '$Password', '$Phanquyen')";
            try {
                $con = $p->moketnoi();
                $kq = mysqli_query($con, $truyvan);
                
                if ($kq) {
                    $last_id = mysqli_insert_id($con);
                } else {
                    $last_id = false;
                }
        
                $p->dongketnoi($con);
                return $last_id;
            } catch(Exception $e) {
                return false;
            }
        }
        public function DangKy2($hoten, $gioitinh, $ngaysinh, $sdt, $diachi, $email, $bhyt, $mapk, $id_taikhoan) {
            $p = new ketnoi();
            $truyvan = "INSERT INTO benhnhan (HovaTen, GioiTinh, NgaySinh, SoDT, DiaChi, Email, BHYT, MaPK, ID)
                        VALUES ('$hoten', '$gioitinh', '$ngaysinh', '$sdt', '$diachi', '$email', '$bhyt', $mapk, $id_taikhoan)";
            try {
                $con = $p->moketnoi();
                $kq = mysqli_query($con, $truyvan);
                if (!$kq) {
                    echo "Lỗi: " . mysqli_error($con);
                    $p->dongketnoi($con);
                    return false;
                }
                $last_id = mysqli_insert_id($con);
                $p->dongketnoi($con);
                return $last_id;
            } catch(Exception $e) {
                echo "Exception: " . $e->getMessage();
                return false;
            }
        }
    }
?>