<?php
$titles = 'Thống kê';
include('config.php');
include('widget/header.php');
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <?php
            include('widget/menu.php');
            ?>
            <!-- SEARCH FORM -->
            <?php
            include('widget/search-form.php');
            ?>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-th-large"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php include('widget/slider-bar.php') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Thống Kê</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                                <li class="breadcrumb-item active">Thống kê</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-1">
                                    <?php
                                    $sql = "SELECT `id`, `name`, `phone`, `note`, DATE_FORMAT(`birthday`, '%d/%m/%Y') as `birth`, `spaid` FROM `customer` WHERE `spaid` =" . $spa['id'] . " AND DATE_FORMAT(`birthday`, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')";
                                    $connect = mysql_connect($mysqlserver, $mysqluser, $mysqlpass);
                                    mysql_select_db($mysqldb, $connect);
                                    mysql_query("set names 'utf8'");
                                    $result = mysql_query($sql, $connect);
                                    $num_rows = mysql_num_rows($result);
                                    ?>
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title"><i class="fa fa-birthday-cake" aria-hidden="true"></i><strong> Sinh nhật hôm nay </strong><span class="badge bg-danger"><?php echo ($num_rows); ?></span></h3>
                                        <a href="list-customer.php">Xem danh sách khách hàng</a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-1">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên Khách hàng</th>
                                                <th>Ngày sinh</th>
                                                <th>Điện thoại</th>
                                                <th>Ghi chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stt = 0;
                                            while ($row = mysql_fetch_assoc($result)) {
                                                $stt++;
                                            ?>
                                                <tr>
                                                    <td><?php echo ($stt); ?></td>
                                                    <td><?php echo ($row['name']); ?></td>
                                                    <td><?php echo ($row['birth']); ?></td>
                                                    <td><?php echo ($row['phone']); ?></td>
                                                    <td><?php echo ($row['note']); ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-1">
                                    <div class="d-flex justify-content-between">
                                        <?php
                                        $sql = "SELECT `id`, `name`, `phone`, `note`, DATE_FORMAT(`birthday`, '%d/%m/%Y') as `birth`, `spaid` FROM `customer` WHERE `spaid` =1 AND DATE_FORMAT(`birthday`, '%m-%d') > DATE_FORMAT(NOW(), '%m-%d') and DATE_FORMAT(`birthday`, '%m-%d') <= DATE_FORMAT((NOW() + INTERVAL +14 DAY), '%m-%d')";
                                        $connect = mysql_connect($mysqlserver, $mysqluser, $mysqlpass);
                                        mysql_select_db($mysqldb, $connect);
                                        mysql_query("set names 'utf8'");
                                        $result = mysql_query($sql, $connect);
                                        $num_rows = mysql_num_rows($result);
                                        ?>
                                        <h3 class="card-title"><i class="fas fa-calendar-alt"></i><strong> Khách hàng sắp sinh nhật </strong><span class="badge bg-warning"><?php echo ($num_rows); ?></span></h3>
                                        <a href="list-customer.php">Xem danh sách khách hàng</a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-1">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên Khách hàng</th>
                                                <th>Ngày sinh</th>
                                                <th>Điện thoại</th>
                                                <th>Ghi chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stt = 0;
                                            while ($row = mysql_fetch_assoc($result)) {
                                                $stt++;
                                            ?>
                                                <tr>
                                                    <td><?php echo ($stt); ?></td>
                                                    <td><?php echo ($row['name']); ?></td>
                                                    <td><?php echo ($row['birth']); ?></td>
                                                    <td><?php echo ($row['phone']); ?></td>
                                                    <td><?php echo ($row['note']); ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
        <?php
        include('widget/footer.php');
        ?>