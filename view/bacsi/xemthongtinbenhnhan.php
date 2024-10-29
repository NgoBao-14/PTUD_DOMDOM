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
                        <form id="searchForm" class="flex items-center">
                            <input type="text" id="patientId" placeholder="Nhập ID bệnh nhân" class="border rounded-l px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600 transition duration-300 h-[42px] flex items-center">Tìm kiếm</button>
                        </form>
                    </div>
                    <div id="patientInfo" class="hidden">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold mb-2">1. Thông tin cá nhân</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <p><strong>ID:</strong> <span id="patient-id"></span></p>
                                <p><strong>Họ và tên:</strong> <span id="patient-name"></span></p>
                                <p><strong>Ngày sinh:</strong> <span id="patient-dob"></span></p>
                                <p><strong>Giới tính:</strong> <span id="patient-gender"></span></p>
                                <p><strong>Mã BHYT:</strong> <span id="patient-insurance"></span></p>
                                <p><strong>Địa chỉ:</strong> <span id="patient-address"></span></p>
                                <p><strong>Số điện thoại:</strong> <span id="patient-phone"></span></p>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">2. Thông tin bệnh án</h3>
                            <div class="mb-4">
                                <label for="examDate" class="block mb-2">Chọn ngày khám:</label>
                                <select id="examDate" class="border rounded px-4 py-2 w-full">
                                    <option value="">Chọn ngày khám</option>
                                </select>
                            </div>
                            <div id="medicalRecord" class="grid grid-cols-2 gap-4">
                                <p><strong>Bác sĩ đã khám:</strong> <span id="doctor-name"></span></p>
                                <p><strong>Chuẩn đoán:</strong> <span id="diagnosis"></span></p>
                                <p><strong>Xét nghiệm:</strong> <span id="tests"></span></p>
                                <p><strong>Lịch sử bệnh lý:</strong> <span id="medical-history"></span></p>
                                <p><strong>Đơn thuốc:</strong> <span id="prescription"></span></p>
                                <p><strong>Lời dặn:</strong> <span id="advice"></span></p>
                                <p><strong>Tái khám:</strong> <span id="follow-up"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("../interface/footer.php"); ?>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const patientId = document.getElementById('patientId').value;
            // In a real application, you would make an API call here to fetch patient data
            // For this example, we'll use mock data
            const patientData = {
                id: '123-456',
                name: 'Nguyễn Văn A',
                dob: '01/01/1990',
                gender: 'Nam',
                insurance: '123-456',
                address: 'Hà Nội',
                phone: '0123456789',
                examDates: ['2023-05-01', '2023-06-15', '2023-07-30']
            };

            // Display patient info
            document.getElementById('patientInfo').classList.remove('hidden');
            document.getElementById('patient-id').textContent = patientData.id;
            document.getElementById('patient-name').textContent = patientData.name;
            document.getElementById('patient-dob').textContent = patientData.dob;
            document.getElementById('patient-gender').textContent = patientData.gender;
            document.getElementById('patient-insurance').textContent = patientData.insurance;
            document.getElementById('patient-address').textContent = patientData.address;
            document.getElementById('patient-phone').textContent = patientData.phone;

            // Populate exam dates
            const examDateSelect = document.getElementById('examDate');
            examDateSelect.innerHTML = '<option value="">Chọn ngày khám</option>';
            patientData.examDates.forEach(date => {
                const option = document.createElement('option');
                option.value = date;
                option.textContent = date;
                examDateSelect.appendChild(option);
            });

            // Add event listener for exam date selection
            examDateSelect.addEventListener('change', function() {
                const selectedDate = this.value;
                if (selectedDate) {
                    // In a real application, you would fetch the medical record for the selected date
                    // Here we'll use mock data
                    const medicalRecord = {
                        doctorName: 'Bác sĩ B',
                        diagnosis: 'Cảm cúm',
                        tests: 'Xét nghiệm máu',
                        medicalHistory: 'Không có bệnh nền',
                        prescription: 'Paracetamol 500mg',
                        advice: 'Nghỉ ngơi và uống nhiều nước',
                        followUp: '2 tuần sau'
                    };

                    document.getElementById('doctor-name').textContent = medicalRecord.doctorName;
                    document.getElementById('diagnosis').textContent = medicalRecord.diagnosis;
                    document.getElementById('tests').textContent = medicalRecord.tests;
                    document.getElementById('medical-history').textContent = medicalRecord.medicalHistory;
                    document.getElementById('prescription').textContent = medicalRecord.prescription;
                    document.getElementById('advice').textContent = medicalRecord.advice;
                    document.getElementById('follow-up').textContent = medicalRecord.followUp;
                }
            });
        });
    </script>
</body>
</html>