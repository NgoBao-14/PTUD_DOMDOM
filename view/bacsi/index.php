<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ Bác Sĩ</title>
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
                        <a href="xemthongtinbenhnhan.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem thông tin bệnh nhân</a>
                        <a href="XemLSKB.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem lịch sử khám bệnh</a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="w-full md:w-3/4 px-4">
                <div class="bg-white shadow-md rounded-lg p-6 min-h-[300px] flex items-center justify-center">
                    <p class="text-xl text-gray-600 text-center">
                        Bác sĩ vui lòng chọn 1 trong các chức năng để thực hiện tác vụ mong muốn..
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php include("../interface/footer.php"); ?>
</body>
</html>