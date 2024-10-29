<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký lịch làm việc</title>
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
                        <a href="dangkylichlamviec.php" class="block w-full text-left px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">Đăng ký lịch làm việc</a>
                        <a href="xemlichlamviec.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem lịch làm việc</a>
                        <a href="XemDSNull.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem danh sách khám</a>
                        <a href="xemthongtinbenhnhan.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem thông tin bệnh nhân</a>
                        <a href="XemLSKB.php" class="block w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition duration-300">Xem lịch sử khám bệnh</a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="w-full md:w-3/4 px-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4">Đăng ký lịch làm việc</h2>
                    <div class="flex justify-between mb-4">
                        <button id="prevWeek" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Tuần trước</button>
                        <button id="currentWeek" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">Hiện tại</button>
                        <button id="nextWeek" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Tuần sau</button>
                    </div>
                    <div id="weekRange" class="text-center font-bold mb-4"></div>
                    <table class="w-full border-collapse">
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
                                    <div class="mb-2">
                                        <input type="checkbox" id="mon-morning" class="mr-2">
                                        <label for="mon-morning">Ca sáng</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="mon-afternoon" class="mr-2">
                                        <label for="mon-afternoon">Ca chiều</label>
                                    </div>
                                </td>
                                <td class="border p-2">
                                    <div class="mb-2">
                                        <input type="checkbox" id="tue-morning" class="mr-2">
                                        <label for="tue-morning">Ca sáng</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="tue-afternoon" class="mr-2">
                                        <label for="tue-afternoon">Ca chiều</label>
                                    </div>
                                </td>
                                <td class="border p-2">
                                    <div class="mb-2">
                                        <input type="checkbox" id="wed-morning" class="mr-2">
                                        <label for="wed-morning">Ca sáng</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="wed-afternoon" class="mr-2">
                                        <label for="wed-afternoon">Ca chiều</label>
                                    </div>
                                </td>
                                <td class="border p-2">
                                    <div class="mb-2">
                                        <input type="checkbox" id="thu-morning" class="mr-2">
                                        <label for="thu-morning">Ca sáng</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="thu-afternoon" class="mr-2">
                                        <label for="thu-afternoon">Ca chiều</label>
                                    </div>
                                </td>
                                <td class="border p-2">
                                    <div class="mb-2">
                                        <input type="checkbox" id="fri-morning" class="mr-2">
                                        <label for="fri-morning">Ca sáng</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="fri-afternoon" class="mr-2">
                                        <label for="fri-afternoon">Ca chiều</label>
                                    </div>
                                </td>
                                <td class="border p-2">
                                    <div class="mb-2">
                                        <input type="checkbox" id="sat-morning" class="mr-2">
                                        <label for="sat-morning">Ca sáng</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="sat-afternoon" class="mr-2">
                                        <label for="sat-afternoon">Ca chiều</label>
                                    </div>
                                </td>
                                <td class="border p-2">
                                    <div class="mb-2">
                                        <input type="checkbox" id="sun-morning" class="mr-2">
                                        <label for="sun-morning">Ca sáng</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="sun-afternoon" class="mr-2">
                                        <label for="sun-afternoon">Ca chiều</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">Lưu lịch làm việc</button>
                </div>
            </div>
        </div>
    </div>

    <?php include("../interface/footer.php"); ?>

    <script>
        function getMonday(d) {
            d = new Date(d);
            var day = d.getDay(),
                diff = d.getDate() - day + (day == 0 ? -6:1);
            return new Date(d.setDate(diff));
        }

        function formatDate(date) {
            return date.getDate().toString().padStart(2, '0') + '/' + 
                   (date.getMonth() + 1).toString().padStart(2, '0') + '/' + 
                   date.getFullYear();
        }

        function updateWeekRange(monday) {
            var sunday = new Date(monday);
            sunday.setDate(sunday.getDate() + 6);
            document.getElementById('weekRange').textContent = 
                formatDate(monday) + ' - ' + formatDate(sunday);
        }

        var currentMonday = getMonday(new Date());

        document.getElementById('prevWeek').addEventListener('click', function() {
            currentMonday.setDate(currentMonday.getDate() - 7);
            updateWeekRange(currentMonday);
        });

        document.getElementById('nextWeek').addEventListener('click', function() {
            currentMonday.setDate(currentMonday.getDate() + 7);
            updateWeekRange(currentMonday);
        });

        document.getElementById('currentWeek').addEventListener('click', function() {
            currentMonday = getMonday(new Date());
            updateWeekRange(currentMonday);
        });

        updateWeekRange(currentMonday);
    </script>
</body>
</html>