<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem lịch làm việc</title>
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
                        <a href="xemlichlamviec.php" class="block w-full text-left px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">Xem lịch làm việc</a>
                        <a href="XemDSNull.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem danh sách khám</a>
                        <a href="xemthongtinbenhnhan.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem thông tin bệnh nhân</a>
                        <a href="XemLSKB.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem lịch sử khám bệnh</a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="w-full md:w-3/4 px-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4">Xem lịch làm việc</h2>
                    <div class="flex justify-between mb-4">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Tuần trước</button>
                        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">Hiện tại</button>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Tuần sau</button>
                    </div>
                    <table class="w-full border-collapse mb-4">
                        <thead>
                            <tr>
                                <th class="border p-2">Thứ 2</th>
                                <th class="border p-2">Thứ 3</th>
                                <th class="border p-2">Thứ 4</th>
                                <th class="border p-2">Thứ 5</th>
                                <th class="border p-2">Thứ 6</th>
                                <th class="border p-2">Thứ 7</th>
                                <th class="border p-2">Chủ nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border p-2">
                                    <div class="mb-2">Ca sáng</div>
                                    <div>Ca chiều</div>
                                </td>
                                <!-- Repeat for other days -->
                                <td class="border p-2">
                                    <div  class="mb-2">Ca sáng</div>
                                    <div>Ca chiều</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-300">In lịch làm việc</button>
                </div>
            </div>
        </div>
    </div>

    <?php include("../interface/footer.php"); ?>

    <script>
        document.querySelector('.bg-yellow-500').addEventListener('click', function() {
            window.print();
        });
    </script>
</body>
</html>