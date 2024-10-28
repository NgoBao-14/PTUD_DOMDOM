<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu Khám Bệnh</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles can be added here if needed */
        .content-container {
            margin-bottom: 30px; /* Thêm khoảng trống 30px cho xa ra footer */
        }
    </style>
</head>
<body class="bg-gray-100">
<!-- header -->
<?php include("../interface/header.php"); ?>
    <div class="container mx-auto px-4 pt-20 content-container">
        <div class="flex flex-wrap -mx-4">
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
            <div class="w-full md:w-2/3 px-4">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Lập phiếu khám</h2>
                    <form id="examinationForm">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Ngày tạo:</label>
                                <input type="date" name="creation_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Ngày hẹn:</label>
                                <input type="date" name="appointment_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Bác sĩ:</label>
                            <input type="text" name="doctor_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Triệu chứng nhập viện:</label>
                            <input type="text" name="symptoms" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Nhiệt độ:<span class="text-red-500">*</span></label>
                                <input type="number" name="temperature" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Nhịp tim:<span class="text-red-500">*</span></label>
                                <input type="number" name="heart_rate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Huyết áp:<span class="text-red-500">*</span></label>
                                <input type="text" name="blood_pressure" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Kết quả cận lâm sàng:</label>
                            <textarea name="lab_results" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="3"></textarea>
                            <p class="text-red-500 text-sm mt-1 hidden" id="lab_results_error">Điền vào kết quả cận lâm sàng</p>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Chuẩn đoán ban đầu:</label>
                            <input type="text" name="initial_diagnosis" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Đơn thuốc:</label>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-700">Thuốc chuyên khoa:</label>
                                    <select name="specialty_medicine" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        <option value="">Chọn chuyên khoa</option>
                                        <option value="specialty1">Chuyên khoa 1</option>
                                        <option value="specialty2">Chuyên khoa 2</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700">Thuốc theo bệnh:</label>
                                    <select name="disease_medicine" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        <option value="">Chọn loại bệnh</option>
                                        <option value="disease1">Loại bệnh 1</option>
                                        <option value="disease2">Loại bệnh 2</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700">Thuốc cụ thể:</label>
                                    <select name="specific_medicine" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        <option value="">Chọn thuốc</option>
                                        <option value="medicine1">Loại thuốc abc</option>
                                        <option value="medicine2">Loại thuốc xyz</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700">Số lượng:</label>
                                    <select name="medicine_quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        <option value="">Chọn số lượng</option>
                                        <option value="1">1 vỉ thuốc</option>
                                        <option value="2">2 vỉ thuốc</option>
                                        <option value="3">3 vỉ thuốc</option>
                                        <option value="4">4 vỉ thuốc</option>
                                        <option value="5">5 vỉ thuốc</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Lời dặn:</label>
                            <textarea name="doctor_notes" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="3"></textarea>
                            <p class="text-red-500 text-sm mt-1 hidden" id="doctor_notes_error">Điền vào lời dặn của bác sĩ</p>
                        </div>
                        <div class="flex justify-between">
                            <button type="button" class="bg-blue-500 text-white font-bold py-2 px-4 rounded" onclick="submitForm()">Lập phiếu khám</button>
                            <button type="button" class="bg-red-500 text-white font-bold py-2 px-4 rounded" onclick="cancel()">Hủy lập phiếu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- footer -->
<?php include("../interface/footer.php"); ?>
<script>
    function submitForm() {
        // Chuyển hướng đến trang Lapphieuoke.php khi lập phiếu khám
        window.location.href = 'Lapphieuoke.php';
    }

    function cancel() {
        // Redirect to the "XemDSYes.php" page
        window.location.href = 'XemDSYes.php';
    }
</script>
</body>
</html>
