<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem thông tin bệnh nhân</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <?php include("../interface/header.php"); ?>

    <div class="container mx-auto px-4 pt-20 pb-8">
        <div class="flex flex-wrap -mx-4">
            <!-- Sidebar -->
            <div class="w-full md:w-1/4 px-4 mb-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h6 class="text-l font-bold mb-4">DANH SÁCH CHỨC NĂNG</h6>
                    <div class="space-y-2">
                        <a href="dangkylichlamviec.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Đăng ký lịch làm việc</a>
                        <a href="xemlichlamviec.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem lịch làm việc</a>
                        <a href="XemDSNull.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem danh sách khám</a>
                        <a href="xemthongtinbenhnhan.php" class="block w-full text-left px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">Xem thông tin bệnh nhân</a>
                        <a href="XemLSKB.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem lịch sử khám bệnh</a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="w-full md:w-3/4 px-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4">Xem thông tin bệnh nhân</h2>
                    <div class="mb-4">
                        <form class="flex items-center">
                            <input type="text" placeholder="Nhập ID bệnh nhân" class="border rounded-l px-4 py-2 w-full">
                            <button type="submit" class="bg-blue-500 text-white px-4 rounded-r hover:bg-blue-600 transition duration-300 text-sm">Tìm kiếm</button>
                        </form>
                    </div>
                    <div id="patient-info" class="hidden">
                        <h3 class="text-xl font-bold mb-2">Thông tin bệnh nhân</h3>
                        <p><strong>ID:</strong> <span id="patient-id"></span></p>
                        <p><strong>Họ tên:</strong> <span id="patient-name"></span></p>
                        <p><strong>Ngày sinh:</strong> <span id="patient-dob"></span></p>
                        <p><strong>Giới tính:</strong> <span id="patient-gender"></span></p>
                        <p><strong>Địa chỉ:</strong> <span id="patient-address"></span></p>
                        <p><strong>Số điện thoại:</strong> <span id="patient-phone"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("../interface/footer.php"); ?>

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            document.getElementById('patient-info').classList.remove('hidden');
            document.getElementById('patient-id').textContent = '12345';
            document.getElementById('patient-name').textContent = 'Nguyễn Văn A';
            document.getElementById('patient-dob').textContent = '01/01/1990';
            document.getElementById('patient-gender').textContent = 'Nam';
            document.getElementById('patient-address').textContent = 'Hà Nội';
            document.getElementById('patient-phone').textContent = '0123456789';
        });
    </script>
</body>
</html>