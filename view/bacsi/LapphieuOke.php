<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Phiếu Khám</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .success-message {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .content-container {
            margin-bottom: 30px; /* Thêm khoảng trống 30px cho xa ra footer */
        }
    </style>
</head>
<body class="bg-gray-100">
    <?php include("../interface/header.php"); ?>

    <div class="container mx-auto px-4 pt-20 content-container">
        <div class="success-message">
            Lập phiếu khám thành công!
        </div>

        <div class="flex flex-wrap -mx-4">
            <!-- Patient Information -->
            <div class="w-full md:w-1/3 px-4 mb-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Thông tin bệnh nhân</h2>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">ID:</label>
                        <span>18T10S004</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Họ và Tên:</label>
                        <span>Võ Cao Kiệt</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Ngày sinh:</label>
                        <span>08-11-2000</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Giới tính:</label>
                        <span>Nam</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">BHYT:</label>
                        <span>xxx-xxx-xxx-xxx</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Địa chỉ:</label>
                        <span>Quang Trung, Gò Vấp, Tp.Hồ Chí Minh</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Số điện thoại:</label>
                        <span>0123456789</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">CCCD:</label>
                        <span>321851833</span>
                    </div>
                </div>
            </div>

            <!-- Examination Details -->
            <div class="w-full md:w-2/3 px-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Phiếu khám</h2>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Mã phiếu khám:</label>
                        <span>MP18T10S4</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">ID bệnh nhân:</label>
                        <span>18T10S004</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Họ và tên:</label>
                        <span>Võ Cao Kiệt</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Ngày sinh:</label>
                        <span>08-11-2000</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">BHYT:</label>
                        <span>xxx-xxx-xxx-xxx</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Ngày tạo:</label>
                        <span>18/10/2024</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Ngày hẹn:</label>
                        <span>18/10/2024</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Bác sĩ:</label>
                        <span>Dr. Cuong</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Triệu chứng nhập viện:</label>
                        <span>Bụng đau</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Các chỉ số cơ thể:</label>
                        <span>Nhiệt độ: 37,7°C ; Nhịp tim: 72 ; Huyết áp: 130mmHg</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Kết quả cận lâm sàng:</label>
                        <span>Niêm mạc dạ dày: có vết loét kích thước 1.5 cm</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Chuẩn đoán ban đầu:</label>
                        <span>Viêm loét dạ dày do nhiễm vi khuẩn Helicobacter pylori</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Đơn thuốc:</label>
                        <span>2 vỉ: Gastropulgite</span>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Lời dặn:</label>
                        <span>Ăn uống, uống thuốc đều đủ, không cần tái khám</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center">
            <a href="XemDSYes.php" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Trở về danh sách khám bệnh</a>
        </div>
    </div>

    <?php include("../interface/footer.php"); ?>
</body>
</html>
