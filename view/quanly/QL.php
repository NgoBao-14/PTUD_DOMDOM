<?php
    include("../../controller/cKhoa.php");
    $p = new cKhoa();
    $tblKhoa = $p->getAllKhoa();

    if(!$tblKhoa){
        echo "không thể kết nối";
    }
    elseif($tblKhoa->num_rows == 0){
        echo "chưa có dữ liệu";
    }
    else{
        while($row = $tblKhoa->fetch_assoc()){
            echo "<a class='list-group-item list-group-item-action sidebar-item' href='?khoa=".$row['MaKhoa']."'>".$row['TenKhoa']."</a><br>";
        }
    }
?>