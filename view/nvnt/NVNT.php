<?php
    include("../../controller/cNVNT.php");
    $p = new cNVNT();
    
    $tblNVNT = $p->getALLDT();
    if(!$tblNVNT)
    {
        echo 'Không kết nối được';
    }
    elseif($tblNVNT==-1)
    {
        echo 'Chưa có dữ liệu';
    }
    else
    {
        if(isset($_GET['chitietdonthuoc']))
        {
            include("chitietdonthuoc.php");
        }
        else
        {
            $dem = 0;
            echo '<h1>Danh Sách Đơn Thuốc</h1>
            <table>
                <thead>
                    <tr>
                        <th style="text-align: center;">STT</th>
                        <th style="text-align: center;">Mã đơn thuốc</th>
                        <th style="text-align: center;">Tên Bệnh Nhân</th>
                        <th style="text-align: center;">Ngày tạo</th>
                        <th style="text-align: center;">Trạng thái</th>
                        <th style="text-align: center;">Mô tả</th>
                        <th style="text-align: center;"></th>
                    </tr>
                </thead>
                <tbody>';
            while($r = $tblNVNT->fetch_assoc())
            {
                echo '<tr>
                    <td data-label="STT">'.$dem.'</td>
                    <td data-label="Order ID">'.$r["MaDT"].'</td>
                    <td data-label="Customer" style="text-align: left;">'.$r["HovaTen"].'</td>
                    <td data-label="Date">'.$r["NgayTao"].'</td>
                    <td data-label="Status"><span class="status status-completed">'.$r["TrangThai"].'</span>
                    <td data-label="MT" style="text-align: left;">'.$r["MoTa"].'</td>
                    <td><a href="?chitietdonthuoc='.$r["MaDT"].'">Xem</a></td>
                    </td>
                    </tr>';
                $dem++;
            }
        }
        echo '</tbody>
        </table>';
        
    }






?>