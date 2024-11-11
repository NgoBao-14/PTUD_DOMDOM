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
    <div class="main">
        <div class="search1">
            <div class="search">
                <div class="text">
                    <h1>Ứng dụng đặt khám</h1>
                    <p>Đặt khám với hơn 600 bác sĩ, 25 bệnh viện, 100 phòng khám trên Đom Đóm để có số thứ tự và khung
                        giờ khám trước.</p>
                </div>
                <div class="search_all">
                    <div class="search_bar">
                        <input type="search" placeholder="Triệu chứng, bác sĩ, bệnh viện,..." class="search-input">
                    </div>
                    <button class="search-btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
            <div class="img">
                <img width="600" height="500" src="img/banner.png" alt="">
            </div>
        </div>
        <!-- Booking bác sĩ -->
        <div class="listbs">
            <div class="booking">
                <h1>Đặt khám bác sĩ</h1>
                <p>Phiếu khám kèm số thứ tự và thời gian của bạn được xác nhận.</p>
                <div class="list" id="doctorList">
                    <?php include("view/bacsi/BacSi.php"); ?>
                </div>
                <button class="see-more-button">Xem thêm ></button>
                <button id="scrollLeftDoctor" class="scroll-button" aria-label="Scroll left">&lt;</button>
                <button id="scrollRightDoctor" class="scroll-button" aria-label="Scroll right">&gt;</button>
            </div>
        </div>
        <!-- Booking bệnh viện -->
        <div class="listbv">
            <div class="booking">
                    <h1>Đặt khám bệnh viện</h1>
                    <p>Đặt khám và thanh toán để có phiếu khám (thời gian, số thứ tự) trước khi đi khám các bệnh viện kết nối chính thức với Đom Đóm.</p>
                    <div class="list" id="hopitalList">
                        <div class="bv_card">
                            <a href="" style="text-decoration: none">
                                <img src="https://via.placeholder.com/300x150" alt="300x150" class="image"> <!-- Chỗ này để ảnh 300x150 dùm nhé-->
                                <div class="bv_info">
                                    <h2 class="name"> Bệnh viện Ung Bướu TPHCM </h2>
                                    <p class="department">47 Nguyễn Huy Lượng, P. 14, Q. Bình Thạnh, TP.HCM</p>
                                    <ul class="time">
                                        <li>Thứ 2 - Thứ 6:  7h30 - 16h30 </li>
                                        <li>Thứ 7 - CN:     7h30 - 11h30 </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="bv_card">
                            <a href="" style="text-decoration: none">
                                <img src="https://via.placeholder.com/300x150" alt="300x150" class="image"> <!-- Chỗ này để ảnh 300x150 dùm nhé-->
                                <div class="bv_info">
                                    <h2 class="name"> Bệnh viện Ung Bướu TPHCM </h2>
                                    <p class="department">47 Nguyễn Huy Lượng, P. 14, Q. Bình Thạnh, TP.HCM</p>
                                    <ul class="time">
                                        <li>Thứ 2 - Thứ 6:  7h30 - 16h30 </li>
                                        <li>Thứ 7 - CN:     7h30 - 11h30 </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="bv_card">
                            <a href="" style="text-decoration: none">
                                <img src="https://via.placeholder.com/300x150" alt="300x150" class="image"> <!-- Chỗ này để ảnh 300x150 dùm nhé-->
                                <div class="bv_info">
                                    <h2 class="name"> Bệnh viện Ung Bướu TPHCM </h2>
                                    <p class="department">47 Nguyễn Huy Lượng, P. 14, Q. Bình Thạnh, TP.HCM</p>
                                    <ul class="time">
                                        <li>Thứ 2 - Thứ 6:  7h30 - 16h30 </li>
                                        <li>Thứ 7 - CN:     7h30 - 11h30 </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="bv_card">
                            <a href="" style="text-decoration: none">
                                <img src="https://via.placeholder.com/300x150" alt="300x150" class="image"> <!-- Chỗ này để ảnh 300x150 dùm nhé-->
                                <div class="bv_info">
                                    <h2 class="name"> Bệnh viện Ung Bướu TPHCM </h2>
                                    <p class="department">47 Nguyễn Huy Lượng, P. 14, Q. Bình Thạnh, TP.HCM</p>
                                    <ul class="time">
                                        <li>Thứ 2 - Thứ 6:  7h30 - 16h30 </li>
                                        <li>Thứ 7 - CN:     7h30 - 11h30 </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="bv_card">
                            <a href="" style="text-decoration: none">
                                <img src="https://via.placeholder.com/300x150" alt="300x150" class="image"> <!-- Chỗ này để ảnh 300x150 dùm nhé-->
                                <div class="bv_info">
                                    <h2 class="name"> Bệnh viện Ung Bướu TPHCM </h2>
                                    <p class="department">47 Nguyễn Huy Lượng, P. 14, Q. Bình Thạnh, TP.HCM</p>
                                    <ul class="time">
                                        <li>Thứ 2 - Thứ 6:  7h30 - 16h30 </li>
                                        <li>Thứ 7 - CN:     7h30 - 11h30 </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <button class="see-more-button">Xem thêm ></button>
                    <button id="scrollLeftHopital" class="scroll-button" aria-label="Scroll left">&lt;</button>
                    <button id="scrollRightHopital" class="scroll-button" aria-label="Scroll right">&gt;</button>
            </div>
        </div>
        <div class="listpk">
            <div class="booking">
                    <h1>Đặt khám phòng khám</h1>
                    <p>Đa dạng phòng khám với nhiều chuyên khoa khác nhau như Sản - Nhi, Tai Mũi họng, Da Liễu, Tiêu Hoá...</p>
                    <div class="list" id="pkList">
                        <div class="bv_card">
                            <a href="" style="text-decoration: none">
                                <img src="https://via.placeholder.com/300x150" alt="300x150" class="image"> <!-- Chỗ này để ảnh 300x150 dùm nhé-->
                                <div class="pk_info">
                                    <h2 class="name"> Bệnh viện Ung Bướu TPHCM </h2>
                                    <p class="department">47 Nguyễn Huy Lượng, P. 14, Q. Bình Thạnh, TP.HCM</p>
                                </div>
                            </a>
                        </div>
                        <div class="bv_card">
                            <a href="" style="text-decoration: none">
                                <img src="https://via.placeholder.com/300x150" alt="300x150" class="image"> <!-- Chỗ này để ảnh 300x150 dùm nhé-->
                                <div class="pk_info">
                                    <h2 class="name"> Bệnh viện Ung Bướu TPHCM </h2>
                                    <p class="department">47 Nguyễn Huy Lượng, P. 14, Q. Bình Thạnh, TP.HCM</p>
                                </div>
                            </a>
                        </div>
                        <div class="bv_card">
                            <a href="" style="text-decoration: none">
                                <img src="https://via.placeholder.com/300x150" alt="300x150" class="image"> <!-- Chỗ này để ảnh 300x150 dùm nhé-->
                                <div class="pk_info">
                                    <h2 class="name"> Bệnh viện Ung Bướu TPHCM </h2>
                                    <p class="department">47 Nguyễn Huy Lượng, P. 14, Q. Bình Thạnh, TP.HCM</p>
                                </div>
                            </a>
                        </div>
                        <div class="bv_card">
                            <a href="" style="text-decoration: none">
                                <img src="https://via.placeholder.com/300x150" alt="300x150" class="image"> <!-- Chỗ này để ảnh 300x150 dùm nhé-->
                                <div class="pk_info">
                                    <h2 class="name"> Bệnh viện Ung Bướu TPHCM </h2>
                                    <p class="department">47 Nguyễn Huy Lượng, P. 14, Q. Bình Thạnh, TP.HCM</p>
                                </div>
                            </a>
                        </div>
                        <div class="bv_card">
                            <a href="" style="text-decoration: none">
                                <img src="https://via.placeholder.com/300x150" alt="300x150" class="image"> <!-- Chỗ này để ảnh 300x150 dùm nhé-->
                                <div class="pk_info">
                                    <h2 class="name"> Bệnh viện Ung Bướu TPHCM </h2>
                                    <p class="department">47 Nguyễn Huy Lượng, P. 14, Q. Bình Thạnh, TP.HCM</p>
                                </div>
                            </a>
                        </div>
                        <div class="bv_card">
                            <a href="" style="text-decoration: none">
                                <img src="https://via.placeholder.com/300x150" alt="300x150" class="image"> <!-- Chỗ này để ảnh 300x150 dùm nhé-->
                                <div class="pk_info">
                                    <h2 class="name"> Bệnh viện Ung Bướu TPHCM </h2>
                                    <p class="department">47 Nguyễn Huy Lượng, P. 14, Q. Bình Thạnh, TP.HCM</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <button class="see-more-button">Xem thêm ></button>
                    <button id="scrollLeftPK" class="scroll-button" aria-label="Scroll left">&lt;</button>
                    <button id="scrollRightPK" class="scroll-button" aria-label="Scroll right">&gt;</button>
            </div>
        </div>
        <div class="new" >
        <h1>Tin tức y tế</h1>
        <div class="news-grid">
            <article class="news-card">
                <img src="https://via.placeholder.com/300x200?text=New+Cancer+Treatment" alt="New Cancer Treatment" class="news-image">
                <div class="news-content">
                    <h2 class="news-title">Breakthrough in Cancer Treatment Shows Promise</h2>
                    <p class="news-description">A new immunotherapy approach has shown remarkable results in early clinical trials, potentially revolutionizing cancer treatment.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
            <article class="news-card">
                <img src="https://via.placeholder.com/300x200?text=COVID-19+Update" alt="COVID-19 Update" class="news-image">
                <div class="news-content">
                    <h2 class="news-title">COVID-19: New Variant Emerges, Vaccination Efforts Intensify</h2>
                    <p class="news-description">Health officials worldwide are monitoring a new COVID-19 variant while ramping up vaccination campaigns to curb its spread.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
            <article class="news-card">
                <img src="https://via.placeholder.com/300x200?text=Mental+Health+Study" alt="Mental Health Study" class="news-image">
                <div class="news-content">
                    <h2 class="news-title">Study Reveals Link Between Exercise and Mental Health</h2>
                    <p class="news-description">New research underscores the significant impact of regular physical activity on mental well-being and cognitive function.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
            <article class="news-card">
                <img src="https://via.placeholder.com/300x200?text=Telemedicine+Advancements" alt="Telemedicine Advancements" class="news-image">
                <div class="news-content">
                    <h2 class="news-title">Telemedicine Advancements Improve Rural Healthcare Access</h2>
                    <p class="news-description">Innovative telemedicine technologies are bridging the gap in healthcare accessibility for rural communities around the globe.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
            <article class="news-card">
                <img src="https://via.placeholder.com/300x200?text=Nutrition+Research" alt="Nutrition Research" class="news-image">
                <div class="news-content">
                    <h2 class="news-title">New Dietary Guidelines: Emphasis on Plant-Based Nutrition</h2>
                    <p class="news-description">Updated nutritional recommendations highlight the benefits of plant-based diets in preventing chronic diseases and promoting longevity.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
            <article class="news-card">
                <img src="https://via.placeholder.com/300x200?text=Medical+AI" alt="Medical AI" class="news-image">
                <div class="news-content">
                    <h2 class="news-title">AI in Medicine: Revolutionizing Diagnosis and Treatment</h2>
                    <p class="news-description">Artificial intelligence is making significant strides in medical imaging analysis and personalized treatment planning, enhancing healthcare outcomes.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
        </div>
        </div>
    </div>

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