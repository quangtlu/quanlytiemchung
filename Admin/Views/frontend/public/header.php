<link rel="shortcut icon" href="./template/img/svg/logo.svg" type="image/x-icon">
<div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
    <!-- ! Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-start">
            <div class="sidebar-head">
                <a href="./index.php?controller=home" class="logo-wrapper" title="Home">
                    <span class="sr-only">Home</span>
                    <div class="logo-text">
                        <span class="logo-title">Hệ thống</span>
                        <span class="logo-subtitle">quản lý tiêm chủng</span>
                    </div>
                </a>
                <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                    <span class="sr-only">Toggle menu</span>
                    <span class="icon menu-toggle" aria-hidden="true"></span>
                </button>
            </div>
            <div class="sidebar-body">
                <ul class="sidebar-body-menu">
                    <li>
                        <a class="" href="./index.php?controller=home"><i
                                class="sidebar-icon fas fa-home"></i></span>Trang chủ</a>
                    </li>
                    <li>
                        <a class="" href="./index.php?controller=vaccine">
                            <i class="sidebar-icon fas fa-syringe" aria-hidden="true"></i></span>Danh mục vaccine
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="./index.php?controller=donvitiemchung">
                            <i class="sidebar-icon fas fa-hospital"></i></span>Đơn vị tiêm chủng
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="./index.php?controller=user">
                            <i class="sidebar-icon fas fa-users"></i>Quản lý người dùng
                        </a>

                    </li>
                    <li>
                        <a class="" href="./index.php?controller=role">
                            <i class="sidebar-icon fas fa-users-cog"></i>Quản lý nhóm quyền
                        </a>
                    </li>
                    <li>
                </ul>

                <ul class="sidebar-body-menu">

                    <li>
                        <a class="show-cat-btn" href="##">
                            <i class="sidebar-icon fas fa-hospital-user"></i></span>Tiêm chủng
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a class="" href="./index.php?controller=dondangky">
                                    <i class="sidebar-icon fas fa-file-medical"></i>Đơn đăng ký
                                </a>
                            </li>
                            <li>
                                <a class="" href="./index.php?controller=dottiemchung">
                                    <i class="sidebar-icon fas fa-briefcase-medical"></i></span>Đợt tiêm chủng
                                </a>
                            </li>
                            <li>
                                <a class="" href="./index.php?controller=xeplichtiemchung">
                                    <i class="sidebar-icon far fa-calendar-alt"></i>Xếp lịch
                                </a>
                            </li>
                            <li><a href="./index.php?controller=phieutiem"><i
                                        class="sidebar-icon fas fa-id-card"></i>Cập nhật hồ sơ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="show-cat-btn" style="color:#fff;cursor:pointer">
                            <i class="sidebar-icon fas fas fa-chart-line"></i></span>Báo cáo thống kê
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a class="" href="./index.php?controller=thongkechung">
                                <i class="sidebar-icon fas fa-hospital-alt"></i></i>Chung
                                </a>
                            </li>
                            <li>
                                <a class="" href="./index.php?controller=thongketheodonvi">
                                <i class="sidebar-icon fas fa-hospital"></i></i></span>Đơn vị tiêm chủng
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-footer">
            <a href="../" class="sidebar-user">
                <div class="sidebar-user-info">
                    <span class="sidebar-user__title">Trang chủ</span>
                    <span class="sidebar-user__subtitle">Cổng thông tin tiêm chủng</span>
                </div>
            </a>
        </div>
    </aside>
    <div class="main-wrapper">
        <!-- ! Main nav -->
        <nav class="main-nav--bg">
            <div class="container main-nav">
                <div>
                    
                </div>
                <div class="main-nav-end">
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                    </button>
                    <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                        <span class="sr-only">Switch theme</span>
                        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                    </button>
                    <div class="notification-wrapper">
                        <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
                            <span class="sr-only">To messages</span>
                            <span class="icon notification active" aria-hidden="true"></span>
                        </button>
                        <ul class="users-item-dropdown notification-dropdown dropdown">
                            <li>
                                <a href="##">
                                    <div class="notification-dropdown-icon info">
                                        <i data-feather="check"></i>
                                    </div>
                                    <div class="notification-dropdown-text">
                                        <span class="notification-dropdown__title">Hệ thống vừa được cập nhật</span>
                                        <span class="notification-dropdown__subtitle">The system has been successfully
                                            update. Read more
                                            here.</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="notification-dropdown-icon danger">
                                        <i data-feather="info" aria-hidden="true"></i>
                                    </div>
                                    <div class="notification-dropdown-text">
                                        <span class="notification-dropdown__title">Không thể thực hiện thao tác</span>
                                        <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot
                                            of memory space and
                                            interfere ...</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="notification-dropdown-icon danger">
                                        <i data-feather="info" aria-hidden="true"></i>
                                    </div>
                                    <div class="notification-dropdown-text">
                                        <span class="notification-dropdown__title">Không thể thực hiện thao tác</span>
                                        <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot
                                            of memory space and
                                            interfere ...</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="link-to-page" href="##">Xem tất cả thông báo</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-user-wrapper">
                        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                            <span class="sr-only">Tài khoản</span>
                            <span class="nav-user-img">
                                <picture>
                                    <source
                                        srcset="./Views/frontend/public/template/img/avatar/avatar-illustrated-02.webp"
                                        type="image/webp"><img
                                        src="./Views/frontend/public/template/img/avatar/avatar-illustrated-02.png"
                                        alt="User name">
                                </picture>
                            </span>
                        </button>
                        <ul class="users-item-dropdown nav-user-dropdown dropdown">
                            <li><a href="##">
                                    <i data-feather="user" aria-hidden="true"></i>
                                    <span>Tài khoản</span>
                                </a></li>
                            <li><a href="##">
                                    <i data-feather="settings" aria-hidden="true"></i>
                                    <span>Cài đặt</span>
                                </a></li>
                            <li><a class="danger" href="./index.php?controller=home&action=logout">
                                    <i data-feather="log-out" aria-hidden="true"></i>
                                    <span>Đăng xuất</span>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>