<?php
include("../model/mLichLamViec.php");

class cLichLamViec
{
    public function dangKyLich()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $MaBS = $_POST['MaBS'] ?? null;
        $schedule = $_POST['schedule'] ?? null;

        if (!$MaBS || !$schedule) {
            die("Dữ liệu không hợp lệ! Vui lòng kiểm tra lại.");
        }

        $model = new mLichLamViec();
        $success = true;

        foreach ($schedule as $day => $shifts) {
            foreach ($shifts as $shift) {
                $NgayLamViec = $this->mapDayToDate($day, $_POST['dateRange']);
                $result = $model->addLichLamViec($MaBS, $NgayLamViec, $shift);

                if (!$result) {
                    $success = false;
                }
            }
        }

        $status = $success ? 'success=1' : 'error=1';
        header("Location: ../view/bacsi/dangkylichlamviec.php?$status");
        exit;
    } else {
        die("Yêu cầu không hợp lệ.");
    }
}

    private function mapDayToDate($day, $dateRange)
    {
        $dateArray = explode(' - ', $dateRange);
        $startDate = DateTime::createFromFormat('d/m/Y', $dateArray[0]);
        $dayMapping = [
            'mon' => 0,
            'tue' => 1,
            'wed' => 2,
            'thu' => 3,
            'fri' => 4,
            'sat' => 5,
            'sun' => 6,
        ];
        $startDate->modify("+{$dayMapping[$day]} day");
        return $startDate->format('Y-m-d');
    }

    
}

// Routing logic


if (isset($_GET['action'])) {
    $controller = new cLichLamViec();
    switch ($_GET['action']) {
        case 'dangkylich':
            $controller->dangKyLich();
            break;
        // ... (other cases)
    }
}