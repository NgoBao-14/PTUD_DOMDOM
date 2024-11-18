<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.css">
    <title>Document</title>
</head>

<body>
    <!-- header -->
    <?php include("view/interface/header.php"); ?>


    <!-- content -->
    <?php
        if(isset($_GET['dangnhap'])){
            include_once("view/khachhang/Login/dangnhap.php");
        } else if(isset($_GET['dangky'])){
            include_once("view/khachhang/Login/dangky.php");
        } else if(isset($_GET['thongtin'])){
            include_once("view/khachhang/Login/thongtin.php");
        } else if(isset($_GET['hoso'])){
            include_once("view/khachhang/Login/hoso.php");
        } else if(isset($_GET['capnhathoso'])){
            include_once("view/khachhang/Login/capnhathoso.php");
        } else if(isset($_GET['lichkham'])){
            include_once("view/khachhang/XemLichKham/xemlk.php");
        } else if(isset($_GET['bacsi'])){
            include_once("view/khachhang/XemLichKham/xembs.php");
        } else if(isset($_GET['lichkhambs'])){
            include_once("view/khachhang/XemLichKham/xemlkbs.php");
        } else if(isset($_GET['dkxn1'])){
            include_once("view/khachhang/DKXetNghiem/dkxetnghiem1.php");
        } else if(isset($_GET['dkxn2'])){
            include_once("view/khachhang/DKXetNghiem/dkxetnghiem2.php");
        } else if(isset($_GET['dkxn3'])){
            include_once("view/khachhang/DKXetNghiem/dkxetnghiem3.php");
        } else if(isset($_GET['dkxn4'])){
            include_once("view/khachhang/DKXetNghiem/dkxetnghiem4.php");
        } else {
            include_once("view/interface/container.php");
        }
    ?>

    <!-- footer -->
    <?php include("view/interface/footer.php"); ?>
</body>
<script>
// Hàm thiết lập cuộn cho một danh sách dựa trên id của danh sách và các nút cuộn
function setupScroll(listId, scrollLeftButtonId, scrollRightButtonId) {
    const list = document.getElementById(listId);
    const scrollLeftButton = document.getElementById(scrollLeftButtonId);
    const scrollRightButton = document.getElementById(scrollRightButtonId);

    scrollLeftButton.addEventListener('click', () => {
        if (list) {
            list.scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        }
    });

    scrollRightButton.addEventListener('click', () => {
        if (list) {
            list.scrollBy({
                left: 200,
                behavior: 'smooth'
            });
        }
    });
}

// Áp dụng hàm cuộn riêng cho từng danh sách
setupScroll('doctorList', 'scrollLeftDoctor', 'scrollRightDoctor');
setupScroll('hopitalList', 'scrollLeftHopital', 'scrollRightHopital');
setupScroll('pkList','scrollLeftPK','scrollRightPK');
</script>


</html>