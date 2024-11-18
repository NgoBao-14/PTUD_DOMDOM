<?php 

ob_start();
    include_once("../../controller/cNVYT.php");
    $p = new cNVYT();

    $id = $_REQUEST['chitiethoadon'];
    $tblNVYT = $p->getCTHD($id);
    while($r = $tblNVYT->fetch_assoc())
    {
            
        
        echo '<form action="" method="post">
        <h1>Hóa đơn #'.$r["MaHD"].'</h1>
        <span class="status status-'.$r["TrangThai"].'">'.$r["TrangThai"].'</span>
        
        <div class="customer-info">
            <h2>Thông tin bệnh nhân</h2>
            <div class="info-grid">
                <div class="info-item"><div class="info-label">Họ và tên:</div><div>'.$r["HovaTen"].'</div></div>
                <div class="info-item"><div class="info-label">Email:</div><div>'.$r["Email"].'</div></div>
                <div class="info-item"><div class="info-label">Điện thoại:</div><div>'.$r["SoDT"].'</div></div>
                <div class="info-item"><div class="info-label">BHYT:</div><div>'.$r["BHYT"].'</div></div>
                <div class="info-item"><div class="info-label">Dịch vụ:</div><div>'.$r["DichVu"].'</div></div>
                <div class="info-item"><div class="info-label">Thời gian:</div><div>'.$r["NgayLapHoaDon"].'</div></div>
            </div>
        </div>';
    }
    $tblPTTT = $p -> loadPTTT();
    echo '<h2>Phương thức thanh toán</h2>
    <table class="payment-table">
        <tr>';
    while($f = $tblPTTT->fetch_assoc())
    {
        $name = $f["TenPTTT"];
        switch ($name) {
            case 'MoMo':
                $name1 = "'momo'";
                break;
            case 'ViSa':
                $name1 = "'visa'";
                break;
            case 'Ngân Hàng':
                $name1 = "'bank'";
                break;
            case 'Tiền mặt':
                $name1 = "'cash'";
        }
        echo '<td onclick="selectPayment(' . $name1 . ')">
        <input type="checkbox" name="paymentOption" value="' . $f["MaPTTT"] . '" onclick="onlyOneCheckbox(this)">
        <div class="payment-icon momo"></div>' . $f["TenPTTT"] . '
      </td>';

    }
    echo '</table>
        <div id="momoAction" class="action-section"><div class="qr-code"></div></div>
        <div id="bankAction" class="action-section"><div class="qr-code"></div></div>
        <div id="visaAction" class="action-section">
            <table id="card-payment-details" class="action-button">
                <tr><td><label for="card-name">Tên trên thẻ</label></td><td><input type="text" id="card-name" name="card-name"></td></tr>
                <tr><td><label for="card-number">Số thẻ</label></td><td><input type="text" id="card-number" name="card-number"></td></tr>
                <tr><td><label for="expiry-date">Ngày hết hạn</label></td><td><input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY"></td></tr>
                <tr><td><label for="cvv">CVV</label></td><td><input type="number" id="cvv" name="cvv"></td></tr>
            </table>
        </div>
        <div id="cashAction" class="action-section"><a href="#" class="action-button">Xác nhận thanh toán tiền mặt</a></div>

        <!-- Nút xác nhận và hủy -->
        <input type="submit" class="nut1" name="nut" id="nut" value="Hủy hóa đơn">
        <input type="submit" class="nut2" name="nut" id="nut" value="Xác nhận hóa đơn">
    ';
    switch($_POST['nut'])
    {
        case 'Xác nhận hóa đơn':
        {
            $MaPTTT =  $_REQUEST["paymentOption"];
            if($p->setPTTT($id,$MaPTTT))
            {
                $TT = "'Completed'";
                if($p->setTrangThai($id,$TT))
                {
                    echo'<script language="javascript">
							alert("Cập nhật phương thức thanh toán thành công");	
							</script>';
                            header("Location:index.php?chitiethoadon=".$id."");
                } 
                else{
                    echo'<script language="javascript">
							alert("Trạng thái chưa được thay đổi");	
							</script>';
                }
            }
            else{
                echo'<script language="javascript">
							alert("Phương thức thanh toán chưa được cập nhật");	
							</script>';
            }
            
            break;
        }
        case 'Hủy hóa đơn':
        {
            $TT = "'Cancelled'";
            if($p->setTrangThai($id,$TT))
            {
                echo'<script language="javascript">
                        alert("Hóa đơn được hủy thành công");	
                        </script>';
                        header("Location: ".$_SERVER['PHP_SELF']);
            } 
            else{
                echo'<script language="javascript">
                        alert("Hóa đơn không được hủy");	
                        </script>';
            }
            break;
        }   
    


    }
    

    ob_end_flush();
?>


