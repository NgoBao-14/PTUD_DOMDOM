<?php
    include("../../controller/cNVYT.php");
    $p = new cNVYT();

    $tblNVYT = $p->getAllHD();
    if(!$tblNVYT)
    {
        echo 'Không kết nối được';
    }
    elseif($tblNVYT==-1)
    {
        echo 'Chưa có dữ liệu';
    }
    else
    {   if(isset($_GET['chitiethoadon']))
        {   
            $id = $_REQUEST['chitiethoadon'];
            $tblNVYT = $p->getCTHD($id);
            while($r = $tblNVYT->fetch_assoc())
            {
                    
                
                echo '<h1>Hóa đơn #'.$r["MaHD"].'</h1>
                <span class="status status-'.$r["TrangThai"].'">'.$r["TrangThai"].'</span>
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
                            <div class="info-label">Dịch vụ:</div>
                            <div>'.$r["DichVu"].'</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Thời gian</div>
                            <div>'.$r["NgayLapHoaDon"].'</div>
                        </div>
                    </div>
                </div>';
                }
                echo '<h2>Phương thức thanh toán</h2>
                <table class="payment-table">
                    <tr>
                        <td onclick="selectPayment('."'momo'".')">
                            <div class="payment-icon momo"></div>
                            MoMo
                        </td>
                        <td onclick="selectPayment('."'bank'".')">
                            <div class="payment-icon bank"></div>
                            Ngân hàng
                        </td>
                    </tr>
                    <tr>
                        <td onclick="selectPayment('."'visa'".')">
                            <div class="payment-icon visa"></div>
                            Thẻ Visa
                        </td>
                        <td onclick="selectPayment('."'cash'".')">
                            <div class="payment-icon cash"></div>
                            Tiền mặt
                        </td>
                    </tr>
                </table>

                <div id="momoAction" class="action-section">
                    <div class="qr-code"></div>
                </div>

                <div id="bankAction" class="action-section">
                    <div class="qr-code"></div>
                </div>

                <div id="visaAction" class="action-section">
                    <table id="card-payment-details" class="action-button">
                        <tr>
                            <td>
                                <label for="card-name">Name on Card</label>
                            </td>
                            <td>
                                <input type="text" id="card-name" name="card-name" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="card-number">Card Number</label>
                            </td>
                            <td>
                                <input type="text" id="card-number" name="card-number" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="expiry-date">Expiry Date</label>
                            </td>
                            <td>
                                <input type="text" id="expiry-date" name="expiry-date"
                                    placeholder="MM/YY" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="cvv">CVV</label>
                            </td>
                            <td>
                                <input type="number" id="cvv" name="cvv" required>
                            </td>
                        </tr>
                    </table>

                </div>
                <div id="cashAction" class="action-section">

                    <a href="#" class="action-button">Xác nhận thanh toán tiền mặt</a>
                </div>';
        }
        elseif (isset($_GET['sualichkham']))
        {
            echo '<h1 class="appointment-title">Medical Appointment Details</h1>
                                <form action="#" method="post" class="appointment-form">
                                    <table class="appointment-table">
                                        <tr class="appointment-table__row">
                                            <th class="appointment-table__header"><label for="patientName">Patient
                                                    Name:</label></th>
                                            <td class="appointment-table__data" data-label="Patient Name:">
                                                <input type="text" id="patientName" name="patientName" required
                                                    class="appointment-input">
                                            </td>
                                        </tr>
                                        <tr class="appointment-table__row">
                                            <th class="appointment-table__header"><label
                                                    for="appointmentDate">Appointment Date:</label></th>
                                            <td class="appointment-table__data" data-label="Appointment Date:">
                                                <input type="date" id="appointmentDate" name="appointmentDate" required
                                                    class="appointment-input">
                                            </td>
                                        </tr>
                                        <tr class="appointment-table__row">
                                            <th class="appointment-table__header"><label
                                                    for="appointmentTime">Appointment Time:</label></th>
                                            <td class="appointment-table__data" data-label="Appointment Time:">
                                                <input type="time" id="appointmentTime" name="appointmentTime" required
                                                    class="appointment-input">
                                            </td>
                                        </tr>
                                        <tr class="appointment-table__row">
                                            <th class="appointment-table__header"><label for="doctorName">Doctor
                                                    Name:</label></th>
                                            <td class="appointment-table__data" data-label="Doctor Name:">
                                                <input type="text" id="doctorName" name="doctorName" required
                                                    class="appointment-input">
                                            </td>
                                        </tr>
                                        <tr class="appointment-table__row">
                                            <th class="appointment-table__header"><label
                                                    for="speciality">Speciality:</label></th>
                                            <td class="appointment-table__data" data-label="Speciality:">
                                                <input type="text" id="speciality" name="speciality" required
                                                    class="appointment-input">
                                            </td>
                                        </tr>
                                        <tr class="appointment-table__row">
                                            <th class="appointment-table__header"><label for="reason">Reason for
                                                    Visit:</label></th>
                                            <td class="appointment-table__data" data-label="Reason for Visit:">
                                                <textarea id="reason" name="reason" required
                                                    class="appointment-input appointment-textarea"></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                    <input type="submit" value="Save Appointment Details" class="appointment-submit">
                                </form>';
        }
        else
        {
        $dem=0;
        echo '<h1>Danh Sách Hóa Đơn</h1>
                <table>
                    <thead>
                        <tr>
                            <th style="text-align: center;">STT</th>
                            <th style="text-align: center;">Mã hóa đơn</th>
                            <th style="text-align: center;">Tên Bệnh Nhân</th>
                            <th style="text-align: center;">Ngày tạo</th>
                            <th style="text-align: center;">Thành tiền</th>
                            <th style="text-align: center;">Trạng thái</th>
                            <th style="text-align: center;">Dịch vụ</th>
                            <th style="text-align: center;">Mô tả</th>
                            <th style="text_align: center"></th>
                        </tr>
                    </thead>
                    <tbody>';
        while($r = $tblNVYT->fetch_assoc())
        {
            echo '<tr>
                <td data-label="STT">'.$dem.'</td>
                <td data-label="Order ID">'.$r["MaHD"].'</td>
                <td data-label="Customer">'.$r["HovaTen"].'</td>
                <td data-label="Date">'.$r["NgayLapHoaDon"].'</td>
                <td data-label="Total">'.$r["TongTien"].'</td>
                <td data-label="Status"><span
                        class="status status-'.$r["TrangThai"].'">'.$r["TrangThai"].'</span>
                <td data-label="DV">'.$r["DichVu"].'</td>
                <td data-label="MT">
                    
                </td>
                <td><a href="index.php?chitiethoadon='.$r["MaHD"].'">Xem</a></td>
                </td>
            </tr>';
            $dem++;
        }
        echo '</tbody>
                                </table>';
    }
    }


?>