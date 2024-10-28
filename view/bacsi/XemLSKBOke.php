<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Khám Bệnh</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <?php include("../interface/header.php"); ?>

    <div class="container mx-auto px-4 pt-20 pb-8">
        <div class="flex flex-wrap -mx-4">
            <!-- Sidebar -->
            <div class="w-full md:w-1/4 px-4 mb-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">DANH SÁCH CHỨC NĂNG</h2>
                    <div class="space-y-2">
                        <button class="w-full text-left px-4 py-2 bg-gray-200 rounded">Đăng ký lịch làm việc</button>
                        <button class="w-full text-left px-4 py-2 bg-gray-200 rounded">Xem lịch làm việc</button>
                        <a href="XemDSnull.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Xem danh sách khám</a>
                        <button class="w-full text-left px-4 py-2 bg-gray-200 rounded">Xem thông tin bệnh nhân</button>
                        <button class="w-full text-left px-4 py-2 bg-blue-500 text-white rounded">Xem lịch sử khám bệnh</button>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="w-full md:w-3/4 px-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Lịch sử khám bệnh</h2>
                    <div class="mb-4">
                        <h3 class="font-bold">Bệnh nhân</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div><span class="font-medium">ID:</span> 18T10S004</div>
                            <div><span class="font-medium">BHYT:</span> xxx-xxx-xxx-xxx</div>
                            <div><span class="font-medium">Họ và Tên:</span> Võ Cao Kiệt</div>
                            <div><span class="font-medium">Địa chỉ:</span> Quang Trung, Gò Vấp, Tp.Hồ Chí Minh</div>
                            <div><span class="font-medium">Ngày sinh:</span> 08-11-2000</div>
                            <div><span class="font-medium">Số điện thoại:</span> 0123456789</div>
                            <div><span class="font-medium">Giới tính:</span> Nam</div>
                            <div><span class="font-medium">CCCD:</span> 321851833</div>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold mb-2">Các lần khám bệnh</h3>
                        <p><span class="font-medium">Số lần khám bệnh:</span> 1</p>
                        <div class="mt-4">
                            <h4 class="font-bold">Kết quả khám bệnh lần 1:</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div><span class="font-medium">Ngày tạo:</span> 18/10/2024</div>
                                <div><span class="font-medium">Ngày hẹn:</span> 18/10/2024</div>
                                <div><span class="font-medium">Bác sĩ:</span> Dr. Cuong</div>
                                <div><span class="font-medium">Triệu chứng nhập viện:</span> Bụng đau</div>
                                <div colspan="2"><span class="font-medium">Các chỉ số cơ thể:</span> Nhiệt độ: 37,7°C ; Nhịp tim: 72 ; Huyết áp: 130mmHg</div>
                                <div colspan="2"><span class="font-medium">Kết quả cận lâm sàng:</span> Niêm mạc dạ dày: có vết loét kích thước 1.5 cm</div>
                                <div colspan="2"><span class="font-medium">Chuẩn đoán ban đầu:</span> Viêm loét dạ dày do nhiễm vi khuẩn Helicobacter pylori</div>
                                <div><span class="font-medium">Đơn thuốc:</span> 2 vỉ: Gastropulgite</div>
                                <div colspan="2"><span class="font-medium">Lời dặn:</span> Ăn uống, uống thuốc đều đủ, không cần tái khám</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 text-center">
                        <a href="XemLSKB.php" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Đóng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("../interface/footer.php"); ?>
</body>
</html>
