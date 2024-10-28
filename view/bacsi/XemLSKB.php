<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Lịch Sử Khám Bệnh</title>
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
                    <form action="XemLSKBOke.php" method="GET" class="mb-4">
                        <div class="flex">
                            <input type="text" name="search" placeholder="Nhập ID bệnh nhân hoặc số BHYT" class="flex-grow px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Tìm kiếm</button>
                        </div>
                    </form>
                    <div class="text-center text-gray-500">
                        Không có dữ liệu...<br>
                        Vui lòng nhập đúng ID bệnh nhân hoặc số thẻ BHYT
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("../interface/footer.php"); ?>
</body>
</html>
