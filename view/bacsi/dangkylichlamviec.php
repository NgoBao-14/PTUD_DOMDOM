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

                    <!-- Thông báo kết quả -->
                    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                            Đăng ký lịch làm việc thành công!
                        </div>
                    <?php elseif (isset($_GET['error']) && $_GET['error'] == 1): ?>
                        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                            Đăng ký thất bại. Có thể lịch đã tồn tại hoặc xảy ra lỗi!
                        </div>
                    <?php endif; ?>

                    <div class="flex justify-between mb-4">
                        <button id="prevWeek" class="hidden bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Tuần trước</button>
                        <button id="currentWeek" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">Hiện tại</button>
                        <button id="nextWeek" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Tuần sau</button>
                    </div>
                    <div id="weekRange" class="text-center font-bold mb-4"></div>
                    <form id="workScheduleForm" method="POST" action="../../controller/cLichLamViec.php?action=dangkylich">
                        <!--<input type="hidden" name="MaBS" value="< ?php echo $_SESSION['MaBS']; ?>">-->
                        <input type="hidden" name="MaBS" value="1">
                        <input type="hidden" id="selectedDateRange" name="dateRange">

                        <table class="w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="border p-2">
                                        <div>Thứ 2</div>
                                        <div id="date-mon" class="text-xs text-gray-500"></div>
                                    </th>
                                    <th class="border p-2">
                                        <div>Thứ 3</div>
                                        <div id="date-tue" class="text-xs text-gray-500"></div>
                                    </th>
                                    <th class="border p-2">
                                        <div>Thứ 4</div>
                                        <div id="date-wed" class="text-xs text-gray-500"></div>
                                    </th>
                                    <th class="border p-2">
                                        <div>Thứ 5</div>
                                        <div id="date-thu" class="text-xs text-gray-500"></div>
                                    </th>
                                    <th class="border p-2">
                                        <div>Thứ 6</div>
                                        <div id="date-fri" class="text-xs text-gray-500"></div>
                                    </th>
                                    <th class="border p-2">
                                        <div>Thứ 7</div>
                                        <div id="date-sat" class="text-xs text-gray-500"></div>
                                    </th>
                                    <th class="border p-2">
                                        <div>Chủ nhật</div>
                                        <div id="date-sun" class="text-xs text-gray-500"></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border p-2">
                                        <div class="mb-2">
                                            <input type="checkbox" name="schedule[mon][]" value="morning">
                                            <label>Ca sáng</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="schedule[mon][]" value="afternoon">
                                            <label>Ca chiều</label>
                                        </div>
                                    </td>
                                    <!-- Tương tự cho các ngày còn lại -->
                                    <td class="border p-2">
                                        <div class="mb-2">
                                            <input type="checkbox" name="schedule[tue][]" value="morning">
                                            <label>Ca sáng</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="schedule[tue][]" value="afternoon">
                                            <label>Ca chiều</label>
                                        </div>
                                    </td>
                                    <td class="border p-2">
                                        <div class="mb-2">
                                            <input type="checkbox" name="schedule[wed][]" value="morning">
                                            <label>Ca sáng</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="schedule[wed][]" value="afternoon">
                                            <label>Ca chiều</label>
                                        </div>
                                    </td>
                                    <td class="border p-2">
                                        <div class="mb-2">
                                            <input type="checkbox" name="schedule[thu][]" value="morning">
                                            <label>Ca sáng</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="schedule[thu][]" value="afternoon">
                                            <label>Ca chiều</label>
                                        </div>
                                    </td>
                                    <td class="border p-2">
                                        <div class="mb-2">
                                            <input type="checkbox" name="schedule[fri][]" value="morning">
                                            <label>Ca sáng</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="schedule[fri][]" value="afternoon">
                                            <label>Ca chiều</label>
                                        </div>
                                    </td>
                                    <td class="border p-2">
                                        <div class="mb-2">
                                            <input type="checkbox" name="schedule[sat][]" value="morning">
                                            <label>Ca sáng</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="schedule[sat][]" value="afternoon">
                                            <label>Ca chiều</label>
                                        </div>
                                    </td>
                                    <td class="border p-2">
                                        <div class="mb-2">
                                            <input type="checkbox" name="schedule[sun][]" value="morning">
                                            <label>Ca sáng</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="schedule[sun][]" value="afternoon">
                                            <label>Ca chiều</label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">
                            Lưu lịch làm việc
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php include("../interface/footer.php"); ?>

    <script>
        function getMonday(d) {
            d = new Date(d);
            var day = d.getDay(),
                diff = d.getDate() - day + (day == 0 ? -6 : 1); // Lấy thứ Hai của tuần hiện tại
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

            // Cập nhật tuần hiển thị trên giao diện
            document.getElementById('weekRange').textContent =
                formatDate(monday) + ' - ' + formatDate(sunday);

            // Đồng bộ với trường hidden
            document.getElementById('selectedDateRange').value =
                formatDate(monday) + ' - ' + formatDate(sunday);

            // Cập nhật ngày cho từng cột
            const days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
            days.forEach((day, index) => {
                const date = new Date(monday);
                date.setDate(date.getDate() + index);
                document.getElementById(`date-${day}`).textContent = formatDate(date);
            });
        }

        // Lấy thứ Hai hiện tại
        var currentMonday = getMonday(new Date());

        // Sự kiện nút tuần trước
        document.getElementById('prevWeek').addEventListener('click', function() {
            currentMonday.setDate(currentMonday.getDate() - 7);
            updateWeekRange(currentMonday);
        });

        // Sự kiện nút tuần sau
        document.getElementById('nextWeek').addEventListener('click', function() {
            currentMonday.setDate(currentMonday.getDate() + 7);
            updateWeekRange(currentMonday);
        });

        // Sự kiện nút tuần hiện tại
        document.getElementById('currentWeek').addEventListener('click', function() {
            currentMonday = getMonday(new Date());
            updateWeekRange(currentMonday);
        });

        // Cập nhật giao diện ban đầu
        updateWeekRange(currentMonday);
    </script>
</body>

</html>