<?php
ob_start();
include_once("../../controller/cNVNT.php");
$p = new cNVNT();
$id = $_REQUEST['chitietdonthuoc'];
$tblNVNT = $p->getCTDT($id);
while($r = $tblNVNT->fetch_assoc())
{
    echo '<form action="" method="post">
    <h1>Đơn thuốc #'.$r["MaDT"].'</h1>
    <span class="status status-completed">'.$r["TrangThai"].'</span>
    <div class="customer-info">
        <h2>Thông tin bệnh nhân</h2>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Họ và tên:</div>
                <div>'.$r["HovaTen"].'</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email:</div>
                <div>'.$r["Email"].'</div>
            </div>
            <div class="info-item">
                <div class="info-label">Điện thoại:</div>
                <div>'.$r["SoDT"].'</div>
            </div>
            <div class="info-item">
                <div class="info-label">BHYT:</div>
                <div>'.$r["BHYT"].'</div>
            </div>
            <div class="info-item">
                <div class="info-label">Bác sĩ:</div>
                <div>'.$r["HovaTenNV"].'</div>
            </div>
            
            <div class="info-item">
                <div class="info-label">Thời gian</div>
                <div>'.$r["NgayTao"].'</div>
            </div>
        </div>
    </div>';
    

}

echo '<h2>Thuốc: </h2>
    <table>
        <thead>
            <tr>
                <th style="text-align: center;">STT</th>
                <th style="text-align: center;">Mã thuốc</th>
                <th style="text-align: center;">Tên thuốc</th>
                <th style="text-align: center;">Số lượng</th>
                <th style="text-align: center;">Giá</th>
                <th style="text-align: center;">Cách dùng</th>
                <th style="text-align: center;">Thành tiền</th>
                
            </tr>
        </thead>
        <tbody>';
$t = $p->getThuoc($id);
$dem = 1;
while($f = $t->fetch_assoc())
{   
    $tt = $f["SoLuong"]*$f["GiaTien"];
        echo '<tr>
                <td>'.$dem.'</td>
                <td>'.$f["MaThuoc"].'</td>
                <td>'.$f["TenThuoc"].'</td>
                <td>'.$f["SoLuong"].'</td>
                <td>'.$f["GiaTien"].'</td>
                <td>'.$f["CachDung"].'</td>
                <td>'.$tt.'</td>
    </tr>';
    $dem++;
    $t1+=$tt;
}

echo '<tr>
        <th colspan="6" style="text-align: center;">Tổng cộng</th>
        <td>'.$t1.'</td>
        </tr>
        </tbody>
        </table>
        <!-- Nút xác nhận và hủy -->
        <input type="submit" class="nut1" name="nut" id="nut" value="Hủy đơn thuốc">
        <input type="submit" class="nut2" name="nut" id="nut" value="Xác nhận đơn thuốc">';
            
            
switch ($_POST["nut"])
{
    case 'Xác nhận đơn thuốc':
        {
            $TT = "'Completed'";
            if($p->setTT($id, $TT))
            {
                echo'<script language="javascript">
							alert("Hóa đơn đã được duyệt");	
							</script>';
                            header("Location:?chitietdonthuoc=".$id."");
            }
            else{
                echo'<script language="javascript">
							alert("Trạng thái chưa được thay đổi");	
							</script>';
            }
        break;
        }
    case 'Hủy đơn thuốc':
        {
            $TT = "'Cancelled'";
            if($p->setTT($id, $TT))
            {
                echo'<script language="javascript">
                        alert("Hóa đơn được hủy thành công");	
                        </script>';
                        header("Location: ".$_SERVER['PHP_SELF']);
            }
            else
                echo'<script language="javascript">
                        alert("Hóa đơn không được hủy");	
                        </script>';
            break;
        }
}
ob_end_flush();
?>