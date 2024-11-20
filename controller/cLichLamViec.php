<?php
include("../model/mLichLamViec.php");

class cLichLamViec
{
    public function dangKyLich()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaBS = $_POST['MaBS'];
            $schedule = $_POST['schedule'];
            $model = new mLichLamViec();

            foreach ($schedule as $day => $shifts) {
                foreach ($shifts as $shift) {
                    $NgayLamViec = $this->mapDayToDate($day, $_POST['dateRange']);
                    $model->addLichLamViec($MaBS, $NgayLamViec, $shift);
                }
            }

            header("Location: ../view/bacsi/dangkylichlamviec.php?success=1");
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
if (isset($_GET['action']) && $_GET['action'] == 'dangkylich') {
    $controller = new cLichLamViec();
    $controller->dangKyLich();
}
