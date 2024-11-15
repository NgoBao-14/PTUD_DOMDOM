<?php
    include_once("model/nguoidung.php");
	class cNguoiDung{
		public function getNguoiDung($user,$pass){
			$pass=md5($pass);
			$p=new NguoiDung();
			$tbl=$p->selectNguoiDung($user,$pass);
			if(mysqli_num_rows($tbl)>0){
				while($r=mysqli_fetch_assoc($tbl)){
					$_SESSION['dn'] = $r['ID'];
					$_SESSION['role'] = $r['phanquyen'];
					$_SESSION['idbn'] = $r['MaBN'];
					$_SESSION['tenbn'] = $r['HovaTen'];
					
				}
				echo "<script>alert('Đăng nhập thành công')</script>";
            	header("refresh:0; url='index.php'");
			} else{
				echo "<script>alert('Sai username hoặc password')</script>";
           		header("refresh:0; url='index.php?dangnhap'");
			}
		}
		public function cDangKy($Username, $Password, $Phanquyen){
            $p = new NguoiDung();
            $kq = $p->DangKy($Username, $Password, $Phanquyen);
            return $kq;
        }
		public function cDangKy2($hoten, $gioitinh, $ngaysinh, $sdt, $diachi, $email, $bhyt, $mapk, $id_taikhoan){
            $p = new NguoiDung();
            $kq = $p->DangKy2($hoten, $gioitinh, $ngaysinh, $sdt, $diachi, $email, $bhyt, $mapk, $id_taikhoan);
            return $kq;
        }
    }
?>