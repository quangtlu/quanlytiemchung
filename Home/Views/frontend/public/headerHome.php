<div class="container-fluid">
    <div class="row header">
        <h2 class="header-heading col-7">CỔNG THÔNG TIN TIÊM CHỦNG COVID-19</h2>
        <nav class="header-nav col-5">
            <ul class="header-nav-list">
                <li><a href="./index.php?" class="header-nav-list-item__link">Trang chủ</a></li>
                <li id="tracuu" class="header-nav-list-item__link">Tra cứu
                    <ul class="lookup-list animate__animated animate__fadeInUp">
                        <li><a href="./index.php?controller=dondangkytiem&action=tracuu&phone=<?php echo $_SESSION['phone'] ?>"
                                class="lookup-item__link">Tra cứu kết quả đăng ký</a></li>
                        <li><a href="./index.php?controller=dondangkytiem&action=lichtiem&phone=<?php echo $_SESSION['phone'] ?>"
                                class="lookup-item__link">Tra cứu lịch tiêm chủng</a></li>
                        <li><a href="./index.php?controller=dondangkytiem&action=hosotiemchung&phone=<?php echo $_SESSION['phone'] ?>"
                                class="lookup-item__link">Tra cứu hồ sơ tiêm chủng</a></li>
                    </ul>
                </li>
                <li><a href="./index.php?controller=dondangkytiem" class="header-nav-list-item__link">Đăng ký tiêm</a>
                </li>
                <li><a id='login' href='./index.php?controller=home&action=logout'
                        class='log header-nav-list-item__link border-radius'>
                        Đăng xuất</a></li>
            </ul>
        </nav>
    </div>
</div>